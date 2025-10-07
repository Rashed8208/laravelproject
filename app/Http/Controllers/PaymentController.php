<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Raziul\Sslcommerz\Facades\Sslcommerz; // SSLCommerz package facade

class PaymentController extends Controller
{
    
    public function checkout(Order $order)
    {
        return view('checkout', compact('order'));
    }

    
    public function pay(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $order = Order::findOrFail($request->order_id);

        
        $amount = $order->final_price ?? $request->amount;
        $tran_id = 'TRX_' . uniqid(); 

        
        $customer = [
            'name' => $order->customer->name ?? 'Guest Customer',
            'email' => $order->customer->email ?? 'guest@example.com',
            'phone' => $order->customer->phone ?? '01700000000',
            'address1' => $order->customer->address ?? 'Dhaka',
        ];

        
        $payment = Sslcommerz::initPayment([
            'total_amount' => $amount,
            'tran_id' => $tran_id,
            'cus_name' => $customer['name'],
            'cus_email' => $customer['email'],
            'cus_phone' => $customer['phone'],
            'cus_add1' => $customer['address1'],
            'value_a' => $order->id, // Custom value — pass order ID
            'success_url' => route('ssl.success'),
            'fail_url' => route('ssl.fail'),
            'cancel_url' => route('ssl.cancel'),
            'ipn_url' => route('ssl.ipn'),
        ]);

        if ($payment && isset($payment['GatewayPageURL'])) {
            
            $order->transaction_id = $tran_id;
            $order->status = 'pending';
            $order->payment_method = 'sslcommerz';
            $order->save();

            
            return redirect($payment['GatewayPageURL']);
        }

        return back()->with('error', 'Unable to initiate SSLCommerz payment.');
    }

    
    

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $order_id = $request->input('value_a');

        $order = Order::findOrFail($order_id);

        if (Sslcommerz::validatePayment($request->all(), $tran_id, $order->final_price)) {
            $order->status = 'paid';
            $order->transaction_id = $tran_id;
            $order->save();

            return redirect()->route('order.success')->with('success', 'Payment successful.');
        }

        return redirect()->route('order.failed')->with('error', 'Payment validation failed.');
    }

    
    public function fail(Request $request)
    {
        $order = Order::find($request->input('value_a'));

        if ($order) {
            $order->status = 'failed';
            $order->save();
        }

        return redirect()->route('order.failed')->with('error', 'Payment failed.');
    }

   
    public function cancel(Request $request)
    {
        $order = Order::find($request->input('value_a'));

        if ($order) {
            $order->status = 'cancelled';
            $order->save();
        }

        return redirect()->route('order.cancelled')->with('error', 'Payment cancelled by user.');
    }

    public function ipn(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $order_id = $request->input('value_a');
        $order = Order::find($order_id);

        if (!$order) {
            return response('Order not found', 404);
        }

        if (Sslcommerz::validatePayment($request->all(), $tran_id, $order->final_price)) {
            $order->status = 'paid';
            $order->transaction_id = $tran_id;
            $order->save();

            return response('IPN OK', 200);
        }

        return response('IPN Validation Failed', 400);
    }
}

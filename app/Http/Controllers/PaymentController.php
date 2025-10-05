<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Raziul\Sslcommerz\Facades\Sslcommerz;  // or whatever facade your package provides

class PaymentController extends Controller
{
    // Show checkout page where payment method is selected
    public function checkout(Order $order)
    {
        // pass the order to view
        return view('checkout', compact('order'));
    }

    // Handle form submission for payment method
    public function pay(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_method' => 'required|in:sslcommerz,cod',
        ]);

        $order = Order::findOrFail($request->order_id);

        if ($request->payment_method == 'cod') {
            // Cash on Delivery
            $order->status = 'pending_cod';  // or whatever you use
            $order->payment_method = 'cod';
            $order->save();

            return redirect()->route('order.success')->with('success', 'Order placed. You pay on delivery.');
        }
        else {  
            // SSLCommerz flow
            $amount = $order->final_price;  // or however you compute
            // prepare customer details
            $customer = [
                'name' => $order->customer->name,
                'email' => $order->customer->email,
                'phone' => $order->customer->phone,
                'address1' => $order->customer->address,
                // more if required
            ];

            $response = Sslcommerz::setOrder($amount, $order->id, "Payment for Order #" . $order->id)
                          ->setCustomer($customer['name'], $customer['email'], $customer['phone'])
                          ->setShippingInfo(0, $customer['address1'])
                          ->makePayment();

            if ($response->success()) {
                return redirect($response->gatewayPageURL());
            }
            else {
                return back()->with('error', 'Unable to initiate payment');
            }
        }
    }

    // SSLCommerz Callbacks

    public function success(Request $request)
    {
        // SSLCommerz sends data here
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');

        // validate payment
        if (Sslcommerz::validatePayment($request->all(), $tran_id, $amount)) {
            $order = Order::findOrFail($request->input('value_a') ?? $request->order_id);
            $order->status = 'paid';
            $order->payment_method = 'sslcommerz';
            $order->transaction_id = $tran_id;
            $order->save();

            return redirect()->route('order.success')->with('success', 'Payment successful');
        }
        else {
            return redirect()->route('order.failed')->with('error', 'Validation failed');
        }
    }

    public function sslFail(Request $request)
    {
        // when payment fails
        $order = Order::findOrFail($request->input('order_id'));
        $order->status = 'payment_failed';
        $order->save();

        return redirect()->route('order.failed')->with('error', 'Payment failed');
    }

    public function sslCancel(Request $request)
    {
        // when user cancels
        $order = Order::findOrFail($request->input('order_id'));
        $order->status = 'payment_cancelled';
        $order->save();

        return redirect()->route('order.cancelled')->with('error', 'Payment cancelled');
    }

    public function sslIPN(Request $request)
    {
        // IPN flow from SSLCommerz (server to server)
        if (Sslcommerz::validatePayment($request->all(), $request->input('tran_id'), $request->input('amount'))) {
            $order = Order::findOrFail($request->input('order_id'));
            $order->status = 'paid';
            $order->payment_method = 'sslcommerz';
            $order->transaction_id = $request->input('tran_id');
            $order->save();
            // respond OK
            return response('IPN OK', 200);
        } else {
            return response('IPN Validation Failed', 400);
        }
    }
}

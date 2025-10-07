<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_item;

class CheckoutController extends Controller
{
    /**
     * Checkout page — supports optional Order model binding
     */
    public function checkout(Order $order = null)
    {
        $cart = Session::get('cart', []);
        $cupon = Session::get('coupon', []);

        // Load divisions and districts safely (check if package is installed)
        $districts = class_exists(District::class) ? District::all() : collect();
        $divisions = class_exists(Division::class) ? Division::all() : collect();

        return view('checkout', compact('cart', 'cupon', 'districts', 'divisions', 'order'));
    }

    /**
     * Handle checkout form submission
     */
    public function placeOrder(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:500',
                'division_id' => 'required|integer',
                'district_id' => 'required|integer',
                'notes' => 'nullable|string|max:1000',
            ]);

            $checkCustomer = Customer::where('email', $request->email)
                ->orWhere('phone', $request->phone)
                ->first();

            if (!$checkCustomer) {
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->address = $request->address;
                $customer->city = $request->division_id;
                $customer->district = $request->district_id;
                if ($request->login && $request->password) {
                    $customer->password = bcrypt($request->password);
                }
                $customer->save();
            } else {
                $customer = $checkCustomer;
            }

            $cart = Session::get('cart', []);
            if (empty($cart)) {
                return redirect()->back()->with('error', 'Your cart is empty!');
            }

            $order = new Order();
            $order->customer_id = $customer->id;
            $order->total_price = array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cart));

            if (Session::has('coupon')) {
                $order->coupon_id = Session::get('coupon.coupon_id');
                $order->discount_amount = Session::get('coupon.discount_amount');
                $order->final_price = Session::get('coupon.total_after_discount');
            } else {
                $order->coupon_id = null;
                $order->discount_amount = 0;
                $order->final_price = $order->total_price;
            }

            $order->notes = $request->notes;
            $order->division_id = $request->division_id;
            $order->district_id = $request->district_id;
            $order->address = $request->address;
            $order->status = 'pending';
            $order->save();

            if ($order) {
                foreach ($cart as $id => $item) {
                    $orderItem = new Order_item();
                    $orderItem->order_id = $order->id;
                    $orderItem->item_id = $id;
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->unit_price = $item['price'];
                    $orderItem->line_total = $item['price'] * $item['quantity'];
                    $orderItem->save();
                }
            }

            // Clear session after order placed
            Session::forget('cart');
            Session::forget('coupon');

            return redirect()->route('home')->with('success', 'Order placed successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

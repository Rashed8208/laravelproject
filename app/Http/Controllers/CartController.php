<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;


class CartController extends Controller
  {
    public function addToCart(Request $request)
    {
        $item = \App\Models\item::find($request->item_id);
        if (!$item) {
            return response()->json(['message' => "No product found."], 404);
        }

        $cart=session::get('cart', []);
        $cart[$item->id] = [
            'name' => $item->name,
            'price' => $item->discount_price ?? $item->price,
            'quantity' => ($cart[$item->id]['quantity'] ?? 0) + 1,
        ];

        session::put('cart', $cart);

        return response()->json(['message' => 'Product added to cart successfully']);
        }
        public function updateCart(Request $request)
        {
        $item = \App\Models\item::find($request->item_id);
        if (!$item) {
            return response()->json(['message' => $request->all()], 404);
        }

        $cart=session::get('cart', []);
        if(!isset($cart[$item->id])) {
            return response()->json(['message' => 'Product not found in cart'], 404);
        }

        if($request->action === 'decrease' && $cart[$item->id]['quantity'] > 1) {
            $cart[$item->id]['quantity']--;
        } elseif($request->action === 'increase') {
            $cart[$item->id]['quantity']++;
        }
        session::put('cart', $cart);
        // if($cart[$item->id]['quantity'] <= 0) {
        //     unset($cart[$item->id]);
        //     session::put('cart', $cart);
        //     return response()->json(['message' => 'Product removed from cart successfully']);
        // }

        return response()->json(['message' => 'Product added to cart successfully']);
    }

    public function viewCart()
    {
        $cart = session::get('cart', []);
        return view('cart', compact('cart'));
    }

    public function removeFromCart($id)
    {
        $cart = session::get('cart', []);
        if (!isset($cart[$id])) {
            return response()->json(['message' => 'Product not found in cart'], 404);
        }
        unset($cart[$id]);
        session::put('cart', $cart);
        session::forget('coupon');

        return response()->json(['message' => 'Product removed from cart successfully']);
    }

    public function checkCoupon(Request $request)
    {
        $total=0;
        $cart = session::get('cart', []);
        foreach($cart as $id=>$item){
            $total+=$item['price'] * $item['quantity'];
        }
        $check=Coupon::where('code',$request->coupon_code)
                    ->where('is_active',1)
                    ->where('start_date','<=',date('Y-m-d'))
                    ->where('end_date','>=',date('Y-m-d'))
                    ->where('usage_limit','>',0)
                    ->where('min_order_amount','<=',$total)
                    ->first();
        if($check){

            if($check->discount_type==1)
                $discount=($total * $check->discount_value)/100;
            else
                $discount=$check->discount_value;

            $total_after_discount=$total-$discount;
            session::put('coupon',[
                'code'=>$check->code,
                'coupon_id'=>$check->id,
                'discount'=>$check->discount_value,
                'discount_amount'=>$discount,
                'total_after_discount'=>$total_after_discount
            ]);
            return response()->json(['valid' => true, 'discount' => $discount]);
        }else{
            return response()->json(['valid' => false, 'message' => 'Invalid coupon code']);
        }
    }
}

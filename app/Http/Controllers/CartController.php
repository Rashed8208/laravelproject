<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
class CartController extends Controller
{
     public function addToCart(Request $request)
    {
        $item = \App\Models\Item::find($request->item_id);
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
}

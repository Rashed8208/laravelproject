<?php

namespace App\Http\Controllers;

use App\Models\order_item;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=order_item::get();
         return view('order_item.index', compact('data'));
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('order_item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order_item::create($request->all());
        return redirect()->route('order_item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(order_item $order_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order_item $order_item)
    {
         return view('order_item.edit',compact('order_item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order_item $order_item)
    {
         $order_item->update($request->all());
      return redirect()->route('order_item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order_item $order_item)
    {
         $order_item->delete();
      return redirect()->route('order_item.index');
    }
}

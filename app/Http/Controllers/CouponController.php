<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=coupon::get();
        return view('coupon.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Coupon::create($request->all());
        return redirect()->route('coupon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(coupon $coupon)
    {
        return view('coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, coupon $coupon)
    {
            $coupon->update($request->all());
      return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(coupon $coupon)
    {
        $coupon->delete();
      return redirect()->route('coupon.index');
    }
}

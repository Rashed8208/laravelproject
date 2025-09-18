<?php

namespace App\Http\Controllers;

use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data=review::get();
        return view('review.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Review::create($request->all());
        return redirect()->route('review.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(review $review)
    {
        return view('review.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, review $review)
    {
        $review->update($request->all());
      return redirect()->route('review.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(review $review)
    {
         $review->delete();
      return redirect()->route('review.index');
    }
}

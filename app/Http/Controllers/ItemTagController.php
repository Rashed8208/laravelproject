<?php

namespace App\Http\Controllers;

use App\Models\item_tag;
use Illuminate\Http\Request;

class ItemTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data=item_tag::get();
        return view('item_tag.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('item_tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Item_tag::create($request->all());
      return redirect()->route('item_tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(item_tag $item_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item_tag $item_tag)
    {
         return view('item_tag.edit',compact('item_tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, item_tag $item_tag)
    {
        $item_tag->update($request->all());
      return redirect()->route('item_tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item_tag $item_tag)
    {
        $item_tag->delete();
      return redirect()->route('item_tag.index');
    }
}

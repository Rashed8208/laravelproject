<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data=tag::get();
        return view('tag.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         Tag::create($request->all());
      return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tag $tag)
    {
         return view('tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tag $tag)
    {
        
         $tag->update($request->all());
      return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tag $tag)
    {
         $tag->delete();
      return redirect()->route('tag.index');
    }
    }


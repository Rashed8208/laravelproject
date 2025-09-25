<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $data=item::get();
        return view('item.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $category=category::get();
          return view('item.create',compact('category')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $input=$request->all();
          if($request->hasFile('image')){
               $fileName = time().'.'.$request->image->extension();  
               $request->image->move(public_path('uploads'), $fileName);
               $input['image']=$fileName;
          }

        Item::create($input);
      return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(item $item)
    {
          $category=category::get();
         return view('item.edit',compact('item','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, item $item)
    {
     $input=$request->all();
          if($request->hasFile('image')){
               $fileName = time().'.'.$request->image->extension();  
               $request->image->move(public_path('uploads'), $fileName);
               $input['image']=$fileName;
          }

         $item->update($input);
      return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(item $item)
    {
         $item->delete();
      return redirect()->route('item.index');
    }
}

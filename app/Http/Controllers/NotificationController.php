<?php

namespace App\Http\Controllers;

use App\Models\notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=notification::get();
        return view('notification.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
    return view('notification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          Notification::create($request->all());
        return redirect()->route('notification.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(notification $notification)
    {
         return view('notification.edit',compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, notification $notification)
    {
         $notification->update($request->all());
      return redirect()->route('notification.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(notification $notification)
    {
         $notification->delete();
      return redirect()->route('notification.index');
    }
}

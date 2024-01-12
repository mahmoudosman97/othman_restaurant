<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index()
    {
        $orders = Order::all();
        return view('orders\index' , compact('orders'));
    }

    
    public function changeStatus(Request $request , $id)
    {
        $order = Order::find($id);
        Order::where('id' ,$id)->update(['status' => $request->status]);
        return back();
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}

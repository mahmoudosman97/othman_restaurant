<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Order;


class FrontPageController extends Controller
{
   
    public function index(Request $request)
    {
        if(!$request->category){
            $meals = Meal::latest()->get();
            return view('frontpage' , compact('meals'));

        }else{
            $meals = Meal::where('category' , $request->category)->get();
             return view('frontpage' , compact('meals'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->small_meal == 0 && $request->medium_meal == 0 && $request->large_meal == 0){
            return back()->with('errormessage' , 'Please Order at least one meal');
        }
        if($request->small_meal < 0 || $request->medium_meal < 0 || $request->large_meal < 0){
            return back()->with('errormessage' , ' Order Shouldnot have negative meal');
        }

        Order::create([
            'user_id' => auth()->user()->id,
            'meal_id' =>$request->meal_id,
            'time' =>$request->time,
            'date' =>$request->date,
            'phone' =>$request->phone,
            'body' =>$request->body,
            'small_meal' =>$request->small_meal,
            'medium_meal' =>$request->medium_meal,
            'large_meal' =>$request->large_meal,
        ]);

        return back()->with('message' , 'your order addedd successfully');
    }

    
    public function show(string $id)
    {

        $meal = Meal::find($id);
        return view('show' , compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

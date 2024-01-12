<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Requests\MealRequest;

class MealController extends Controller
{
    
    public function index()
    {
        $meals = Meal::paginate(2);
        return view('meals.index' , compact('meals'));
    }

    
    public function create()
    {
         return view('meals.create');
    }

    
    public function store(MealRequest  $request)
    {
        $path = $request->image->store('public/meals');

        Meal::create([
            'name' =>$request->name,
            'description' =>$request->description,
            'small_meal_price' =>$request->small_meal_price,
            'medium_meal_price' =>$request->medium_meal_price,
            'large_meal_price' =>$request->large_meal_price,
            'category' =>$request->category,
            'image' =>$path,
        ]);

        return redirect()->route('meals.index')->with('message' , 'Meal addedd Successfully');
    }

    
    public function show(Meal $meal)
    {
        //
    }

    
    public function edit(Meal $meal)
    {
        return view('meals.edit' , compact('meal'));
    }

    
    public function update(MealRequest $request, Meal $meal)
    {
        if($request->has('image')){
            $path=$request->image->store('public/meals') ;

        }else{
           $path= $meal->image;
        }

       $meal->update([
            'name' =>$request->name,
            'description' =>$request->description,
            'small_meal_price' =>$request->small_meal_price,
            'medium_meal_price' =>$request->medium_meal_price,
            'large_meal_price' =>$request->large_meal_price,
            'category' =>$request->category,
            'image' =>$path,
        ]);

        return redirect()->route('meals.index')->with('message' , 'Meal Updated Successfully');
    }
    
    public function destroy(Meal $meal)
    {
        $meal->delete();
         return redirect()->route('meals.index')->with('message' , 'Meal Deleted Successfully');
    }
}

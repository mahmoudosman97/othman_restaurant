<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' =>'required|string',
            'description' =>'required|string',
            'small_meal_price' =>'required|numeric',
            'medium_meal_price' =>'required|numeric',
            'large_meal_price' =>'required|numeric',
            'category' =>'required',
            'image' =>'required',
        ];
    }
}

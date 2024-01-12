@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Menu</h1>
                </div><!-- card-header -->

                <div class="card-body">

                   <div class="list-group">
                        
                       <form action="{{ route('frontpage') }}" method="get">
                        <a href="/" class="list-group-item list-group-item-action">All Categories</a>
                            <button type="submit" value="shawerma" name="category" class="list-group-item list-group-item-action">Shawerma</button>
                            <button type="submit" value="pizza" name="category" class="list-group-item list-group-item-action">Pizza</button>
                            <button type="submit" value="burger" name="category" class="list-group-item list-group-item-action">Burger</button>
                        </div>
                    </form>

                </div><!--card-body  -->
            </div>
        </div><!-- col-md-4 -->

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center text-bg-primary"> Meals {{count($meals)}} </h1>
                </div><!-- card-header -->

                <div class="card-body text-center">
                
                    <div class="row">
                        @forelse ($meals as $meal)
                           <div class="col-md-4 my-2">
                            <div class="card p-3 text-center">
                                <img src =" {{ Storage::url($meal->image) }}" height="100" >
                                <h3>{{$meal->name}}</h3>
                                <h3>{{$meal->category}}</h3>
                                <div class="d-flex justify-content-between my-2">
                                    <h5>S : {{$meal->small_meal_price}}</h5>
                                    <h5>M  : {{$meal->medium_meal_price}}</h5>
                                    <h5>L  : {{$meal->large_meal_price}}</h5>
                                </div>
                                <a href="{{ route('meal.show', $meal->id) }}" class="btn btn-danger mb-1">
                                    Order Now
                                </a>
                            </div>
                        </div><!-- col-md-4 --> 
                        @empty
                            <h1>No Meals</h1>
                        @endforelse
                        

                    </div><!-- row -->
                </div><!-- card body -->
@endsection

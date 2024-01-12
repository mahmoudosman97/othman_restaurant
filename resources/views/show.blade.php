@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center bg-danger text-white">Order Now</h3>
                </div><!-- card-header -->

                <div class="card-body ">
                  @if (session('message'))
                  <div class="alert alert-success">
                      {{ session('message') }}
                  </div>
              @endif
                  @if (session('errormessage'))
                  <div class="alert alert-danger">
                      {{ session('errormessage') }}
                  </div>
              @endif
                   @if (Auth::check())
                       <form action="{{ route('order.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <p>Name: {{auth()->user()->name}} </p>
                                <p>email: {{auth()->user()->email}} </p>
                                <p>phone number: <input type="number" name="phone" required class="form-control"> </p>
                                <div class="row mb-2">
                                    <label>Meal Count</label>
                                    <div class="col">
                                      <input type="number"  class="form-control form-control-lg " placeholder="Small meal" name="small_meal">
                                    </div>
                                    <div class="col">
                                      <input type="number"  class="form-control form-control-lg " placeholder="Medium meal" name="medium_meal">
                                    </div>
                                    <div class="col">
                                      <input type="number"  class="form-control form-control-lg " placeholder="Large meal" name="large_meal">
                                    </div>
                                  </div>

                                  <div>
                                    <input type="hidden" name="meal_id" value="{{$meal->id}}">
                                  </div>

                                  <div class="form-group">
                                    <p>Date : <input type="date" name="date" class="form-control"></p>
                                    <p>Time : <input type="time" name="time" class="form-control"></p>
                                    <p>Message: <textarea name="body"  rows="3" class="form-control"></textarea></p>
                                  </div>

                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">Make Order</button>
                                  </div>
                            </div>
                       </form>
                   @else
                      <a href="{{ route('login') }}" class="btn btn-danger"> Please login first </a>
                   @endif
                        
                      

                </div><!--card-body  -->
            </div>
        </div><!-- col-md-4 -->

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center bg-danger text-white">Meal</h3>
                </div><!-- card-header -->

                <div class="card-body text-center">
                   

                        <img src =" {{ Storage::url($meal->image) }}" height="100" >
                        <h3>{{$meal->name}}</h3>
                        
                        <div class="d-flex justify-content-between my-2">
                            <h5>Sm.Price : {{$meal->small_meal_price}}</h5>
                            <h5>M.Price  : {{$meal->medium_meal_price}}</h5>
                            <h5>L.Price  : {{$meal->large_meal_price}}</h5>
                        </div>
                        <h3>{{$meal->description}}</h3>
                 
                </div><!-- card body -->
@endsection

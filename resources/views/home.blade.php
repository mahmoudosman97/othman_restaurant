@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-danger">
                    <h1>Your History Orders</h1>
                </div><!--card-header  -->

                <div class="card-body">
                    <table class="table table-secondary table-striped table-bordered table-hover ">
                        <thead class="">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">User</th>
                            <th scope="col">Phone / Email</th>
                            <th scope="col">Date / Time</th>
    
                            <th scope="col">Meal</th>
                            <th scope="col">S.Meal</th>
                            <th scope="col">M.Meal</th>
                            <th scope="col">L.Meal</th>
                            <th scope="col">Total</th>
    
                            <th scope="col">Body</th>
                            <th scope="col">Status</th>
    
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($orders)>0)  
                            @foreach ($orders as $key => $order)  
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->user->email}} /{{$order->phone}} </td>
                                <td>{{$order->date}} /{{$order->time}} </td>
                                <td>{{$order->meal->name}}</td>
                                <td>{{$order->small_meal}}</td>
                                <td>{{$order->medium_meal}}</td>
                                <td>{{$order->large_meal}}</td>
    
                                <td>
                                    {{
                                    $order->small_meal*$order->meal->small_meal_price+
                                    $order->medium_meal*$order->meal->medium_meal_price+
                                    $order->large_meal*$order->meal->large_meal_price
                                    }}
                                </td>
                                <td>{{$order->body}}</td>
                                <td>{{$order->status}}</td>
    
                              
                            </tr>
                          
    
    
                            @endforeach
    
                            @else
                                <h1>No Meals</h1>
                            @endif
                        </tbody>
                      </table>
                </div><!-- card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

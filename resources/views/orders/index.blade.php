@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Menu</h1>
                </div><!-- card-header -->

                <div class="card-body">

                   <div class="list-group">
                        
                        <a href="{{ route('meals.index') }}" class="list-group-item list-group-item-action">Display all meals</a>
                        <a href="{{ route('meals.create') }}" class="list-group-item list-group-item-action">Create new meal</a>
                        <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">Orders</a>
                        
                      </div>
                </div><!--card-body  -->
            </div>
        </div><!-- col-md-3 -->

        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center text-bg-primary">Orders </h1>
                </div><!-- card-header -->

                <div class="card-body text-center">
                
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

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

                        <th scope="col">Accepted</th>
                        <th scope="col">Rejected</th>
                        <th scope="col">Completed</th>
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

                           <form action="{{ route('changeStatus',$order->id) }}" method="post">
                            @csrf
                             <td>
                                <button type="submit" name="status" value="accepted" class="btn btn-success btn-sm">Acccepted</button>
                            </td>
                             <td>
                                <button type="submit"  name="status" value="rejected" class="btn btn-danger btn-sm">Rejected</button>
                            </td>
                             <td>
                                <button type="submit" name="status" value="completed" class="btn btn-warning btn-sm">Completed</button>
                            </td>

                           </form>
                        </tr>
                      


                        @endforeach

                        @else
                            <h1>No Meals</h1>
                        @endif
                    </tbody>
                  </table>
                
                </div><!--card-body  -->
            </div>
        </div><!-- col-md-9 -->

    </div>
</div>
@endsection

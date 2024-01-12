@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
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

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center text-bg-primary">All Meals </h1>
                </div><!-- card-header -->

                <div class="card-body text-center">
                
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table table-secondary table-striped table-bordered table-hover ">
                    <thead class="">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Description</th>
                        <th scope="col">S.Price</th>
                        <th scope="col">M.Price</th>
                        <th scope="col">L.Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($meals)>0)  
                        @foreach ($meals as $key => $meal)  
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$meal->name}}</td>
                            <td><img src =" {{ Storage::url($meal->image) }}" height="50"> </td>
                            <td>{{$meal->description}}</td>
                            <td>{{$meal->small_meal_price}}</td>
                            <td>{{$meal->medium_meal_price}}</td>
                            <td>{{$meal->large_meal_price}}</td>
                            <td>{{$meal->category}}</td>
                            <td><a href="{{ route('meals.edit', $meal->id) }}" class="btn btn-warning btn-sm">Edit</a></td>
                            <td>
                                
                                    <button  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delModel{{$meal->id}}" >Delete</button>
                                
                            </td>
                        </tr>
                        <!-- Modal -->
<div class="modal fade" id="delModel{{$meal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ route('meals.destroy', $meal->id) }}" method="post">
        @csrf
        @method('delete')
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Confirmation </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <h2 class="text-bg-danger">Are you sure?</h2>
        </div>

        <div class="modal-footer text-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
</form>
  </div>

                        @endforeach

                        @else
                            <h1>No Meals</h1>
                        @endif
                    </tbody>
                  </table>
                  <div>
                    {{$meals->links()}}
                  </div>
                </div><!--card-body  -->
            </div>
        </div><!-- col-md-9 -->

    </div>
</div>
@endsection

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
                    <h1 class="text-center text-bg-primary">Create new meal</h1>
                </div><!-- card-header -->

                <div class="card-body text-center">
                  @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
               @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    <form action="{{ route('meals.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    
                  <input type="text" class="form-control form-control-lg mb-2" placeholder="Name of meal" name="name">
                  <textarea name="description"  rows="3" class="form-control form-control-lg" placeholder="Description of meal" ></textarea>

                  <div class="row mb-2">
                    <label>Meal Price</label>
                    <div class="col">
                      <input type="number"  class="form-control form-control-lg " placeholder="Small meal" name="small_meal_price">
                    </div>
                    <div class="col">
                      <input type="number"  class="form-control form-control-lg " placeholder="Medium meal" name="medium_meal_price">
                    </div>
                    <div class="col">
                      <input type="number"  class="form-control form-control-lg " placeholder="Large meal" name="large_meal_price">
                    </div>
                  </div>

                  <select class="form-select form-select-lg mb-2" aria-label="Default select example" name="category">
                    <option selected>Category</option>
                    <option value="pizza">Pizza </option>
                    <option value="burger">Burger</option>
                    <option value="shawerma">Shawerma</option>
                  </select>

                  <input type="file" class="form-control form-control-lg mb-2"  name="image">

                  <button type="submit" class="btn btn-danger w-50 mb-2">Save</button>
                </form>

                </div><!--card-body  -->
            </div>
        </div><!-- col-md-9 -->

    </div>
</div>
@endsection

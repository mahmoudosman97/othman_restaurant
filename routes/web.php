<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\Controllers\Middleware as ControllersMiddleware;
use Illuminate\Routing\MiddlewareNameResolver;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\FrontPageController::class, 'index'])->name('frontpage');
Route::get('/meal/{id}', [App\Http\Controllers\FrontPageController::class, 'show'])->name('meal.show');
Route::post('/order/store', [App\Http\Controllers\FrontPageController::class, 'store'])->name('order.store');



Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->group(function () {

Route::get('/meals', [App\Http\Controllers\MealController::class, 'index'])->name('meals.index');
Route::get('/meals/create', [App\Http\Controllers\MealController::class, 'create'])->name('meals.create');
Route::post('/meals/store', [App\Http\Controllers\MealController::class, 'store'])->name('meals.store');

Route::get('/meals/edit/{meal}', [App\Http\Controllers\MealController::class, 'edit'])->name('meals.edit');
Route::put('/meals/update/{meal}', [App\Http\Controllers\MealController::class, 'update'])->name('meals.update');
Route::delete('/meals/destroy/{meal}', [App\Http\Controllers\MealController::class, 'destroy'])->name('meals.destroy');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
Route::post('/changeStatus/{id}', [App\Http\Controllers\OrderController::class, 'changeStatus'])->name('changeStatus');

});
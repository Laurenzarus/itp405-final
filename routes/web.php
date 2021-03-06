<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'CustomersController@index');

Route::get('/home', 'HomeController@index');

Route::get('/signup', 'SignupController@index');
Route::post('/signup', 'SignupController@signup');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

// Route::get('/employees', 'EmployeesController@index');
// Route::get('/employees/{id}/edit', 'EmployeesController@show');
// Route::post('/employees', 'EmployeesController@edit');

Route::get('/customers', 'CustomersController@index');
Route::get('/customers/new', 'CustomersController@create');
Route::post('/customers/new', 'CustomersController@store');

Route::middleware(['authenticated'])->group(function() {
    Route::get('/customers/{id}/edit', 'CustomersController@show');
    Route::get('/customers/{id}/delete', 'CustomersController@delete');
    Route::post('/customers', 'CustomersController@edit');
    Route::get('/orders/new', 'OrdersController@create');
    Route::post('/orders', 'OrdersController@store');
    Route::get('/orders/{id}/delete', 'OrdersController@delete');
});

Route::get('/test', 'TestsController@index');

Route::get('/orders', 'OrdersController@index');


Route::get('/shippers', 'ShippersController@index');
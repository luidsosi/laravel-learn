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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/client', 'ClientController@index');
Route::get('/client/create', 'ClientController@create');
Route::post('/client/create', 'ClientController@store');
Route::post('/client/{id}/edit', 'ClientController@edit');
Route::delete('/client/{id}', 'ClientController@delete');
Route::get('/order/create', 'OrderController@create');
Route::post('/order/create', 'OrderController@store');
Route::get('/client/{clientId}/orders', 'OrderController@index');
Route::get('/order/{order}/items', 'OrderItemController@index');
Route::get('/order/{order}/orderItems/check', 'OrderItemController@check');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

Auth::routes();

//HOME
Route::get('/home', 'HomeController@allTransport')->name('home');
Route::get('/', 'HomeController@allTransport')->name('home');

//TRANSPORT
Route::get('/transport/{hash}/edit', 'TruckController@edit');
Route::put('/transport/{hash}', 'TruckController@update');
Route::delete('/transport/{hash}', 'TruckController@destroy');
Route::resource('/transport', 'TruckController');


//REPAIRS
Route::resource('repairs', 'RepairController', ['except' => ['edit', 'update']]);
Route::get('repairs/{hash}/edit','RepairController@edit');
Route::put('repairs/{hash}', 'RepairController@update');

//SEARCH
Route::any('/search', "SearchController@searchAll")->middleware('ajax');

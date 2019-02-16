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
Route::get('/transport', 'HomeController@transport')->name('transport');


//REPAIRS
Route::resource('repairs', 'RepairController');
Route::get('/repairs/{hash}/edit','RepairController@edit');
Route::put('/repairs/{hash}', 'RepairController@update');

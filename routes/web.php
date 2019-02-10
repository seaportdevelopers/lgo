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


Route::get('/home', 'HomeController@allTransport')->name('home');

Route::get('/', 'HomeController@allTransport')->name('home');
Route::get('/transport', 'HomeController@transport')->name('transport');
Route::resource('repairs', 'RepairController', [
   'as' => 'r'
]);
Route::resource('repairs', 'RepairController');
Route::get('/repairs/{idno}/edit', 'RepairController@edit');


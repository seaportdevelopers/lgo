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
Route::any('repair/delete', 'RepairController@delete');
Route::put('repairs/{hash}', 'RepairController@update');

//INSURANCE
Route::resource('insurance', 'InsuranceController', ['except' => ['create']]);
Route::any('insurance/create', 'InsuranceController@create');

//DRIVERS
Route::resource('drivers', 'DriversController', ['except' => ['create']]);
Route::any('drivers/create', 'DriversController@create');

//ROUTES
Route::resource('routes', 'RoutesController', ['except' => ['store']]);
Route::any('routes/store', 'RoutesController@store')->name('routes.store');

//SEARCH
Route::any('/search', "SearchController@searchAll")->middleware('ajax');
Route::post('/search/status', "SearchController@changeStatus")->middleware('ajax');

//Example map route is here
Route::get('/examples/map', function(){
	$config = array();
	$config['center'] = 'Clifton, Karachi';
	GMaps::initialize($config);
	$map = GMaps::create_map();
	echo $map['js'];
	echo $map['html'];
});
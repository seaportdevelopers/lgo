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
Route::get('/transport/{hash}/edit', 'TruckController@edit')->name("truck.edit");
Route::put('/transport/{hash}', 'TruckController@update')->name("truck.update");
Route::delete('/transport/{hash}', 'TruckController@destroy')->name("truck.destroy");
Route::resource('/transport', 'TruckController');

//REPAIRS
Route::resource('repairs', 'RepairController', ['except' => ['edit', 'update']]);
Route::get('repairs/{hash}/edit','RepairController@edit')->name("repairs.edit");
Route::any('repair/delete', 'RepairController@delete')->name("repairs.delete");
Route::put('repairs/{hash}', 'RepairController@update')->name("repairs.update");

//INSURANCE
Route::resource('insurance', 'InsuranceController', ['except' => ['edit', 'update']]);
Route::get('insurance/{hash}/edit', 'InsuranceController@edit')->name("insurance.edit");
Route::post('insurance/{hash}', 'InsuranceController@update')->name("insurance.update");

//DRIVERS
Route::resource('drivers', 'DriversController', ['except' => ['edit', 'update']]);
Route::get('drivers/{hash}/edit', 'DriversController@edit')->name("drivers.edit");
Route::post('drivers/{hash}', 'DriversController@update')->name("drivers.update");

//ROUTES
Route::resource('routes', 'RoutesController', ['except' => ['edit', 'update']]);
Route::get('routes/{hash}/edit', 'RoutesController@edit')->name("routes.edit");
Route::post('routes/{hash}', 'RoutesController@update')->name("routes.update");

//CARGOS
Route::post('/transport/cargo', 'CargoController@store')->name("cargo.store");

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

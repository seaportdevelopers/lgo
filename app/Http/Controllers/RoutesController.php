<?php

namespace App\Http\Controllers;

use App\Routes;
use App\Truck;
use App\Drivers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Routes::all();
        $drivers = Drivers::all();
        $cargos = Truck::where('category', '2')->get();
        $trucks = Truck::where('category', '1')->get();
        return view('routes.show', compact('routes', 'cargos', 'trucks', 'drivers'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $routes = Routes::all();
      $drivers = Drivers::all();
      $cargos = Truck::where('category', '2')->get();
      $trucks = Truck::where('category', '1')->get();
      return view('routes.create', compact('routes', 'cargos', 'trucks', 'drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
          'CARGO'      => 'required',
          'FROM'      => 'required',
          'TO' => 'required',
          'DRIVER'      => 'required',
          'TRUCK'      => 'required',
          'DATE_START' => 'required',
          'DATE_END' => 'required',
          'TIME_START' => 'required',
          'TIME_END' => 'required',
        );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
        Session::flash('message', 'Error!');
          return Redirect::back()
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          $FullDriversName = explode(' ', Input::get('DRIVER'));
          $driver = Drivers::where('Fname', $FullDriversName[0])->where('Lname', $FullDriversName[1])->get()->first()->id;
          // foreach ($driverArray as $D) {
          //   $driver = $D->id;
          // }
          $cargo = Truck::select('id')->where('category', '2')->where('idno', Input::get('CARGO'))->get()->first()->id;
          // foreach ($cargoArray as $C) {
          //   $cargo = $C->id;
          // }
          $truck = Truck::select('id')->where('category', '1')->where('idno', Input::get('TRUCK'))->get()->first()->id;
          // foreach ($truckArray as $T) {
          //   $truck = $T->id;
          // }
          $DrivenOut = Input::get('DATE_START')." ".Input::get('TIME_START');
          $DrivenIn = Input::get('DATE_END')." ".Input::get('TIME_END');
          // store
          $rep = new Routes;
          //$rep->idnoid = Input::get('idnoid');
          $rep->userCreated = Auth::user()->id;
          $rep->POINT_A = Input::get('FROM');
          $rep->POINT_B = Input::get('TO');
          $rep->type = Input::get('TYPE');
          $rep->client = 'nenurodyta';
          $rep->driverID = $driver;
          $rep->TruckID = $truck;
          $rep->CargoID = $cargo;
          $rep->DrivenOut = $DrivenOut;
          $rep->DrivenIn = $DrivenIn;
          $rep->save();

          // redirect
          Session::flash('suc', '1');
          return redirect('routes');
      }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function show(Routes $routes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function edit($hash)
    {
        dd($hash);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hash)
    {
        dd($hash);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routes $routes)
    {
        //
    }
}

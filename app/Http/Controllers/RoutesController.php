<?php

namespace App\Http\Controllers;

use App\Routes;
use Illuminate\Http\Request;

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
        return view('routes.show', compact('routes'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $rules = array(
          'idnoid'       => 'required',
          'CARGO'      => 'required',
          'FROM'      => 'required',
          'TO' => 'required',
          'CLIENT'      => 'required',
          'DRIVER'      => 'required',
          'TRUCK'      => 'required',
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
        Session::flash('message', 'Error!');
          return Redirect::back()
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $rep = new Route;
          $rep->idnoid = Input::get('idnoid');
          $rep->userCreated = Auth::name();
          $rep->POINT_A = Input::get('FROM');
          $rep->POINT_B = Input::get('TO');
          $rep->type = Input::get('TYPE');
          $rep->client = Input::get('CLIENT');
          $rep->driverID = Input::get('DRIVER');
          $rep->TruckID = Input::get('TRUCK');
          $rep->CargoID = Input::get('CARGO');
          $rep->save();

          // redirect
          Session::flash('suc', '1');
          return back();
      }
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function edit(Routes $routes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routes $routes)
    {
        //
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

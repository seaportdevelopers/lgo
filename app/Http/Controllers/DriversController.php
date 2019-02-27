<?php

namespace App\Http\Controllers;

use App\Drivers;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Drivers::all();
        return view('drivers.show', compact('drivers'));
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
          'Fname'       => 'required',
          'Lname'      => 'required',
          'birthDate'      => 'required|date',
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
          $rep = new Drivers;
          $rep->Fname = Input::get('Fname');
          $rep->Lname = Input::get('Lname');
          $rep->birthDate = Input::get('birthDate');
          $rep->save();

          // redirect
          Session::flash('suc', '1');
          return back();
      }
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
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function show(Drivers $drivers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit(Drivers $drivers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drivers $drivers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drivers $drivers)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Insurance;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurances = Insurance::all();
        return view('insurance.show', compact('insurances'));
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
          'name'      => 'required',
          'serial'      => 'required',
          'greenSerial' => 'required',
          'dateFrom'      => 'required|date',
          'dateTo'      => 'required|date'
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
          $rep = new Insurance;
          $rep->idnoid = Input::get('idnoid');
          $rep->name = Input::get('name');
          $rep->serial = Input::get('serial');
          $rep->greenSerial = Input::get('greenSerial');
          $rep->dateFrom = Input::get('dateFrom');
          $rep->dateTo = Input::get('dateTo');
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
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Insurance $insurance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit(Insurance $insurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insurance $insurance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insurance $insurance)
    {
        //
    }
}

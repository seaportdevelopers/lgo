<?php

namespace App\Http\Controllers;

use App\Repair;

use App\Truck;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $repairs = Repair::all();
      return view('repairs.show', compact('repairs'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $trucks = Truck::all();
      return view('repairs.create', compact('trucks'));
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
      $rules = array(
          'informer'       => 'required',
          'idno'      => 'required',
          'desc' => 'required',
          'repComp'      => 'required',
          'repDate'      => 'required|date',
          'repDateFinished'      => 'required|date',
          'responsible'      => 'required',
          'price'      => 'required|float'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          return Redirect::to('repairs/create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $nerd = new Repair;
          $nerd->name       = Input::get('name');
          $nerd->email      = Input::get('email');
          $nerd->nerd_level = Input::get('nerd_level');
          $nerd->save();

          // redirect
          Session::flash('message', 'Successfully created nerd!');
          return Redirect::to('nerds');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repair $repair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        //
    }
}

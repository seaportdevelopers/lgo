<?php

namespace App\Http\Controllers;

use App\Truck;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use \App\User;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks = Truck::all();
        return view('transport.show', compact('trucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
          'idno'       => 'required',
          'category'      => 'numeric',
          'status'      => 'numeric',
          'manufacturer' => 'required',
          'model'      => 'required',
          'rlYear'      => 'required|numeric'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
        Session::flash('message', 'Error!');
          return Redirect::to('transport')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $rep = new Truck;
          $rep->idno = Input::get('idno');
          $rep->category = Input::get('category');
          $rep->manufacturer = Input::get('manufacturer');
          $rep->model = Input::get('model');
          $rep->rlYear = Input::get('rlYear');
          $rep->status = -1;
          $rep->save();

          // redirect
          Session::flash('suc', '1');
          return Redirect::to('transport');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit($hash)
    {
        $truck = Truck::where('id', decrypt($hash))->first();
        return view('transport.edit', compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hash)
    {
      $rep = Truck::where('id', decrypt($hash))->first();
      $rules = array(
        'idno'       => 'required',
        'category'      => 'numeric',
        'status'      => 'numeric',
        'manufacturer' => 'required',
        'model'      => 'required',
        'rlYear'      => 'required|numeric'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
        Session::flash('message', 'Error!');
          return redirect()->back()
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $rep->idno = Input::get('idno');
          $rep->category = Input::get('category');
          $rep->manufacturer = Input::get('manufacturer');
          $rep->model = Input::get('model');
          $rep->rlYear = Input::get('rlYear');
          $rep->update();


          // redirect
          Session::flash('suc', '1');
          return Redirect::to('transport');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy($hash)
    {
      $tr = Truck::where('id', decrypt($hash));
      $tr->delete();
      return Redirect::To('transport');
    }
}

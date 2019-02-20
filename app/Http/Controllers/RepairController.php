<?php

namespace App\Http\Controllers;

use App\Repair;

use App\Truck;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use \App\User;

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
      $trucks = Truck::all();
      $users = User::all();
      return view('repairs.show', compact('repairs', 'users', 'trucks'));
        //
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
          'informer'       => 'required',
          'status'      => 'required',
          'idno'      => 'required',
          'desc' => 'required',
          'repComp'      => 'required',
          'repDate'      => 'required|date',
          'repDateFinished'      => 'required|date',
          'responsible'      => 'required',
          'price'      => 'required|numeric'
      );
      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
        Session::flash('message', 'Error!');
          return Redirect::to('repairs')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
      } else {
          // store
          $rep = new Repair;
          $rep->status =  Input::get('status');
          $rep->idno = Input::get('idno');
          $rep->userInformed = Input::get("informer");
          $rep->description =  Input::get('desc');
          $rep->repairCompany =  Input::get('repComp');
          $rep->repairDate =  Input::get('repDate');
          $rep->repairDateEnd =  Input::get('repDateFinished');
          $rep->userResponsible = Input::get("responsible");
          $rep->repairsPrice =  Input::get('price');
          $rep->save();

          // redirect
          Session::flash('suc', '1');
          return Redirect::to('repairs');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit($hash)
    {
        $id = decrypt($hash);
        $repair = Repair::where('id', $id)->first();
        $users = User::all();
        $trucks = Truck::all();
        return view('repairs.edit', compact('repair', 'users', 'trucks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $hash)
    {
        $rep = Repair::where('id', decrypt($hash))->first();
        $rules = array(
            'informer'       => 'required',
            'status'      => 'required',
            'idno'      => 'required',
            'desc' => 'required',
            'repComp'      => 'required',
            'repDate'      => 'required|date',
            'repDateFinished'      => 'required|date',
            'responsible'      => 'required',
            'price'      => 'required|numeric'
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
            $rep->status =  Input::get('status');
            $rep->idno = Input::get('idno');
            $rep->userInformed = Input::get("informer");
            $rep->description =  Input::get('desc');
            $rep->repairCompany =  Input::get('repComp');
            $rep->repairDate =  Input::get('repDate');
            $rep->repairDateEnd =  Input::get('repDateFinished');
            $rep->userResponsible = Input::get("responsible");
            $rep->repairsPrice =  Input::get('price');
            $rep->save();

            // redirect
            Session::flash('suc', '1');
            return Redirect::to('repairs');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        $repair->delete();
        return Redirect::To('repairs');
    }
}

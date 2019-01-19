<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;
use App\Cargo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function transport(){
      $trucks = Truck::all();
      $cargos = Cargo::all();
      return view('transport.show', compact('trucks'));
   }
    public function allTransport() {
      $data = \App\Truck::all();
      return view('home')->with('data', $data);
    }

}

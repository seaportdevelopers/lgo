<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\User;
use \App\Truck;
use \App\Repair;

class SearchController extends Controller
{
    public function searchAll(Request $req) {
      $q = $req->message;
      $users = User::where('name', 'LIKE', '%'.$q.'%')->orwhere('surname', 'LIKE', '%'.$q.'%')->orwhere('email', 'LIKE', '%'.$q.'%')->get();
      $trucks = Truck::where('idno', 'LIKE', '%'.$q.'%')->orwhere('model', 'LIKE', '%'.$q.'%')->orwhere('manufacturer', 'LIKE', '%'.$q.'%')->orwhere('rlYear', 'LIKE', '%'.$q.'%')->get();
      $repairs = Repair::where('idno', 'LIKE', '%'.$q.'%')->orwhere('description', 'LIKE', '%'.$q.'%')->orwhere('repairCompany', 'LIKE', '%'.$q.'%')->orwhere('repairDate', 'LIKE', '%'.$q.'%')->get();


    
    }
}

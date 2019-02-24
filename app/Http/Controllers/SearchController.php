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

      $msg = "";
      foreach($users as $user) {
        $msg .= "<h1>".$user->name."</h1> ".$user->surname."<br/>";
        break;
      }

      foreach($trucks as $truck) {
        $msg .= "<h1>".$truck->idno."</h1> ".$truck->model."<br/>";
        break;
      }
      foreach($repairs as $repair) {
        $msg .= "<h1>".$repair->idno."</h1> ".$repair->description."<br/>";
        break;
      }
      if(count($users)==0 && count($trucks)==0 && count($repairs) == 0) return response()->json(['status' => 'error', 'message' => 'null']);
      return response()->json(['status' => 'success', 'message' => $msg]);
    }

    public function changeStatus(Request $req) {
      $id = explode("status", $req->id);
      $id = $id[1];
      $status = $req->status;
      $rep = Repair::where('id', $id)->first();
      $rep->status = $status;
      $rep->save();
      return response()->json(['status' => 'success', 'id' => $id]);
    }
}

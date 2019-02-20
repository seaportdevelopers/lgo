<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\User;


class SearchController extends Controller
{
    public function searchAll() {
      $q = Input::get('q');
      $user = User::where('name', 'LIKE', '%'.$q.'%')->orwhere('surname', 'LIKE', '%'.$q.'%')->orwhere('email', 'LIKE', '%'.$q.'%')->get()->first()->surname;
      dd($user);
    }
}

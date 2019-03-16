<?php

namespace App;
use \App\Routes;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    public function cargo() {
      return $this->hasOne('\App\Cargo');
    }

    public function driver() {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function insurance(){
    	return $this->belongsTo(Insurance::class, 'name');
    }

    public function expenses() {
      return $this->hasMany(Expense::class);
    }

    public function route() {
      return $this->hasMany(Routes::class);
    }
}

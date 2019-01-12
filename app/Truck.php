<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    public function cargo() {
      return $this->hasOne('\App\Cargo');
    }
}

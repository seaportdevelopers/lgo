<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function truck() {
      return $this->belongsTo('\App\Truck');
    }
}

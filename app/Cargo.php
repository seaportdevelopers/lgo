<?php

namespace App;
use \App\Routes;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    public function truck() {
      return $this->belongsTo('\App\Truck');
    }

    public function route() {
      return $this->belongsTo(Routes::class, 'CargoID');
    }

    public function driver() {
      return $this->truck->driver;
    }
}

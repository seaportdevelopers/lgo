<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
	public function driver(){
		return $this->belongsTo(Drivers::class, 'driverID');
	}
	public function truck(){
		return $this->belongsTo(Truck::class, 'TruckID');
	}
	public function cargo(){
		return $this->belongsTo(Cargo::class, 'CargoID');
	}
    //
}

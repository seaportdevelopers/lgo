<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
	public function driver(){
		return $this->hasMany(Drivers::class, 'id', 'driverID');
	}
	public function truck(){
		return $this->hasMany(Truck::class, 'id', 'TruckID');
	}
	public function cargo(){
		return $this->hasMany(Truck::class, 'id', 'CargoID');
	}
    //
}

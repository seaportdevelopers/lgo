<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
	public function driver(){
		return $this->hasOne(Drivers::class, 'id', 'driverID');
	}
	public function truck(){
		return $this->hasOne(Truck::class, 'id', 'TruckID');
	}
	public function cargo(){
		return $this->hasOne(Truck::class, 'id', 'CargoID');
	}
    //
}

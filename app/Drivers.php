<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
	public function route() {
		return $this->hasMany(Routes::class, "driverID");
	}
    //
}

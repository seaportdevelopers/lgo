<?php

namespace App;
use \App\Routes;

use Illuminate\Database\Eloquent\Model;

class Drivers extends Model
{
	public function route() {
		return $this->hasMany(Routes::class);
	}
    //
}

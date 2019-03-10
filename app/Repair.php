<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    //
    public function informer() {
      return $this->belongsTo(User::class, 'userInformed');
    }

    public function responsible() {
      return $this->belongsTo(User::class, 'userResponsible');
    }

}

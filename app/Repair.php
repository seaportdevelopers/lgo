<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    //
    public function noter() {
      return $this->belongsTo(User::class, 'noter_id');
    }

    public function responsible() {
      return $this->belongsTo(User::class, 'responsible_id');
    }

}

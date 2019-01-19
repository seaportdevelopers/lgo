<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
<<<<<<< HEAD
    //
=======
    public function noter() {
      return $this->belongsTo(User::class, 'noter_id');
    }

    public function responsible() {
      return $this->belongsTo(User::class, 'responsible_id');
    }

>>>>>>> 3478286718e31157871f828e0c4efaef095cd624
}

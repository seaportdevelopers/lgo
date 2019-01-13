<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public function truck() {
      return $this->belongsTo(Truck::class, 'truck_id');
    }

    public function creator() {
      return \App\User::find($this->creator_id);
    }

    public function approver() {
      return \App\User::find($this->approver_id);
    }
}

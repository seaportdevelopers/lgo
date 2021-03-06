<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function truck() {
      return $this->hasOne(Truck::class);
    }

    public function cargo() {
      return $this->truck->cargo;
    }

    public function noted() {
      return $this->hasMany(Repair::class, 'noter_id');
    }

    public function responsible() {
      return $this->hasMany(Repair::class, 'responsible_id');
    }
}

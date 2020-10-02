<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable

{
    use Notifiable;
    public $timestamps = true;
    const UPDATED_AT = null;
    protected $fillable = ['login','email','password'];
    //protected  $primaryKey = 'login';
    //public $incrementing = false;
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable

{
    public $timestamps = true;
    const UPDATED_AT = null;
    protected $fillable = ['login','email','password'];
    //protected  $primaryKey = 'login';
    //public $incrementing = false;
}

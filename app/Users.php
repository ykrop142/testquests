<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;
class Users extends Authenticatable

{
    use Notifiable;
    public $timestamps = true;
    const UPDATED_AT = null;
    protected $fillable = ['login','email','password'];
    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
    //protected  $primaryKey = 'login';
    //public $incrementing = false;
}

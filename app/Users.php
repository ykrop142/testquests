<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = true;
    const UPDATED_AT = null;
    protected  $primaryKey = 'login';
    public $incrementing = false;
}

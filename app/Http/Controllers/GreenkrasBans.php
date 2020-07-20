<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bans;

class GreenkrasBans extends Controller
{
    public function viewers(){
        $ban = Bans::all();
     //   return $ban;
        return view('admin.bans',compact('ban'));
    }
}

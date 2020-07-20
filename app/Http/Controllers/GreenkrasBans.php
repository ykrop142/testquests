<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bans;

class GreenkrasBans extends Controller
{

    public function viewers(){
        $ban = Bans::all();
        return view('admin.bans',compact('ban'));
    }

    public function create(){
        return view('admin.create');
    }

    public function storenewban(){
        $ban = new Bans();
        $ban->id_user=request('id_user');
        $ban->reason=request('reason');
        $ban->validity=request('validity');
        $ban-> save();
        return redirect('/admin');
        //return request()->all();
    }
}

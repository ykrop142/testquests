<?php

namespace App\Http\Controllers;

use DB;
class About extends Controller
{
    public function index(){
        $about=DB::table('about')
        ->get();
        return view('about',compact('about'));
    }
}

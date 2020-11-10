<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class About extends Controller
{
    public function index(){
        $about=DB::table('about')
        ->get();
        return view('about',compact('about'));
    }
}

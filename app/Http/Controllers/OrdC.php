<?php

namespace App\Http\Controllers;

use App\Ord;
use Illuminate\Http\Request;
use View;

class OrdC extends Controller
{
    public function add(Request $request){
        $ord=new Ord();
        $ord->id_item=$request->id;
        $ord->session_tok=$request->session()->token();
        $ord->Save();
        $linker=url()->previous();
        return redirect($linker);
    }

    public function up(Request $request){
        $ord=new Ord();
        $ord->id_item=$request->id;
        $ord->session_tok=$request->session()->token();
        $ord->Save();
        $linker=url()->previous();
        return redirect($linker);
    }

    public function down(Request $request){
        $ord=Ord::where('id_item','=',$request->id)->first();
        $ord->delete();
        $linker=url()->previous();
        return redirect($linker);
    }
}

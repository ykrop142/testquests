<?php

namespace App\Http\Controllers;

use App\Ord;
use Illuminate\Http\Request;
use View;
use Carbon\Carbon;

class OrdC extends Controller
{
    public function add(Request $request){
        $ord=new Ord();
        $ord->create_at = Carbon::now('Europe/Moscow')->format('Y-m-d H:i:s');
        if($request->session()->exists('orders')){
        }else {
            $bytes = random_bytes(15);
            $id_orders=bin2hex($bytes);
            $request->session()->push('orders', $id_orders);
        }
        $ord->id_orders = session('orders')[0];
        $ord->id_item = $request->id;
        $ord->session_tok = $request->session()->token();
        $ord->Save();
        $linker = url()->previous();
        return redirect($linker);

    }

    public function up(Request $request){
        $ord=new Ord();
        $ord->create_at = Carbon::now('Europe/Moscow')->format('Y-m-d H:i:s');
        $ord->id_orders= session('orders')[0];
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

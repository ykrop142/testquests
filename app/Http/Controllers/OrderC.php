<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class OrderC extends Controller
{
    public function index(Request $request){
        $itemname=\DB::table('items')->get();
        $itemnumb=\DB::table('items')->count();

        $sess=$request->session()->token();
        $coldublord=DB::table('ord')
            ->select('id_item',DB::raw('count(id_item) as count'))
            ->where('session_tok','=',$sess)
            ->groupBy('id_item')
            ->having('count','>','0')
            ->get()->toArray();
        $count=count($coldublord);

        for($i=0;$i<$count;$i++){
            for($j=0;$j<$itemnumb;$j++){
                if($coldublord[$i]->id_item==$itemname[$j]->id){
                    $coldublord[$i]->nameitem=$itemname[$j]->nameitem;
                    $coldublord[$i]->price=($itemname[$j]->price)*$coldublord[$i]->count;
                }
            }
        }
        return view('/orders',compact('coldublord'));
    }
}

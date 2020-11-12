<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class OrderC extends Controller
{
    public function index(Request $request){
        if($request->session()->exists('orders')){
            $itemname=\DB::table('items')->get();
            $itemnumb=\DB::table('items')->count();

            $sess=session('orders')[0];
            $coldublord=DB::table('ord')
                ->select('id_item',DB::raw('count(id_item) as count'))
                ->where('id_orders','=',$sess)
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
        }else{return redirect('/alert');}

    }

    public function buy(Request $request){
        $buy=new Order();
        $buy->ids_ord=session('orders')[0];
        $buy->address=$request->address;
        $buy->phone=$request->phone;
        $buy->email=$request->email;
        $buy->comment=$request->comment;
        $buy->create_at = Carbon::now('Europe/Moscow')->format('Y-m-d H:i:s');
        $buy->save();
        $request->session()->push('status', 'orders');
        $request->session()->push('email', $buy->email);
        return redirect('/sendhtmlemail');

    }
}

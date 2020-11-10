<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemC extends Controller
{
    public function index(){
        $items = Item::paginate(3);
        return view('main',compact('items'));
    }

    public function viewitems(Request $request){
        $check = new Item();
        $check->namert=$request->vibor;
        $items=Item::where('type','=',$check->namert)->paginate(3);
        return view('main',compact('items'));
    }
}

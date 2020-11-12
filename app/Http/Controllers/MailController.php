<?php
namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use DB;

class MailController extends Controller {

    public function html_email(Request $request){
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

        //dd($email);
        $data=compact('coldublord');
        Mail::send('mail', $data, function($message) {
            $email=array('email'=> session('email')[0]);
            $message->to($email['email'])->subject
            ('Заказ успешно принят');
           $message->from('kepu142142@gmail.com','testsusimag');
        });
        $request->session()->pull('orders');
        $request->session()->pull('email');
        return redirect('/alert');
    }

}

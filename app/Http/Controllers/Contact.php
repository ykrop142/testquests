<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class Contact extends Controller
{
    public function index(){
        return view('contact');
    }

    public function feedback(Request $request){
        $feed= new Feedback();
        $feed->email=request('email');
        $feed->phone=request('phone');
        $feed->text_feedback=request('text_feedback');
        $feed->save();
        $request->session()->push('status', 'feedback');
        return redirect('/alert');
    }

    public function alert(Request $request){
        $data = $request->session()->all();
        if($request->session()->exists('status')){
            if($data['status'][0]=='feedback'){
                $text='Ваше обращение успешно отправлено!';
                $request->session()->pull('status');
                return response()->view('/alert', compact('text'));
            }
        }else{
            $request->session()->pull('status');
            abort(404);
        }
    }
}

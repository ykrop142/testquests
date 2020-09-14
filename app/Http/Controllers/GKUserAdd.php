<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class GKUserAdd extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reg = new Users();
        $chek=$reg->login=request('login');
        $reger=Users::find($chek);
        if(!empty($reger))
        {
           echo 'Пользователь с таким логином уже существует';
           header("refresh: 4;url= https://test.greenkras.ru/main");
        }
        else
            {
             $reg->login=request('login');
             $reg->email=request('mail');
             $reg->password=request('password');
             $reg-> save();
             echo 'Вы успешно зарегистрировались';
             header("refresh: 4;url= https://test.greenkras.ru/main");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $users)
    {
        //
    }
}

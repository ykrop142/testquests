<?php

namespace App\Http\Controllers;

use App\Bans;
use Illuminate\Http\Request;

class GreenKrasBPost extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ban = Bans::all();
        return view('admin.bans',compact('ban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ban = new Bans();
        $ban->id_user=request('id_user');
        $ban->reason=request('reason');
        $ban->validity=request('validity');
        $ban-> save();
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bans  $bans
     * @return \Illuminate\Http\Response
     */
    public function show(Bans $bans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bans  $bans
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bans = Bans::find($id);
        return view('admin.edit',compact('bans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bans  $bans
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $bans = Bans::find($id);
        $bans->id_user=request('id_user');
        $bans->reason=request('reason');
        $bans->validity=request('validity');
        $bans-> save();
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bans  $bans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bans $bans)
    {
        //
    }
}

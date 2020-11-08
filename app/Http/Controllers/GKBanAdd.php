<?php

namespace App\Http\Controllers;

use App\Bans;
use App\Users;
use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
class GKBanAdd extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ban = Bans::all();
        $user= \DB::table('users')
            ->get();
        $countuser=DB::table('users')
            ->count('id');
        $countban=DB::table('bans')
            ->count('id');
        for ($i=0;$i<$countuser;$i++){
            for ($j=0;$j<$countban;$j++) {
                if($user[$i]->id==$ban[$j]->id_user){
                    $ban[$j]->user=$user[$i]->login;
                }
            }
        }
        $myCollectionObj = collect($ban);
        $data = $this->paginate($myCollectionObj);
        $data->setPath('/admin');
        return view('admin.bans',compact('data'));
    }

    public function paginate($items, $perPage = 10, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page);
    }

    public function indexuser()
    {
        $user = Users::all();
        $nametit= \DB::table('titles')
            ->get();
        $countuser=DB::table('users')
            ->count('id');
        $counttit=DB::table('titles')
            ->count('id');
        for ($i=0;$i<$countuser;$i++){
            for ($j=0;$j<$counttit;$j++){
                if($user[$i]->id_tit==$nametit[$j]->id){
                    $user[$i]->id_tit=$nametit[$j]->name;
                    $user[$i]->rgb=$nametit[$j]->RGB;
                }
            }
        }
        return view('admin.users',compact('user'));
    }

    public function viewprofileuser($id)
    {
        $user = Users::findOrFail($id);
        $nametit= \DB::table('titles')
            ->get();
        $counttit=DB::table('titles')
            ->count('id');
        $checkban=DB::table('bans')
            ->select('reason')
            ->where('id_user','=',$user->id)
            ->value('reason');
        for ($j=0;$j<$counttit;$j++){
            if($user->id_tit==$nametit[$j]->id){
                $user->id_tit=$nametit[$j]->name;
                $user->rgb=$nametit[$j]->RGB;
            }
        }
        if($checkban!=''){
            $user->reason=$checkban;
        }

        return view('admin.viewprofile',compact('user'));
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
        $validatedData = $request->validate([
            'id_user' => ['required'],
            'reason' => ['required'],
            'validity' => ['required'],
        ]);
        $ban = new Bans();
        $ban->id_user=$validatedData['id_user'];
        $ban->reason=$validatedData['reason'];
        $ban->validity=$validatedData['validity'];
        $ban-> save();
        if ($ban-> save()==true){
            $user=DB::table('users')
                ->where('id','=',$ban->id_user)
                ->update(['ban'=>1]);
        }
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
    public function edit()
    {
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

        $bans = Bans::findOrFail($id);
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
    public function destroy($id)
    {
        $banid=DB::table('bans')
            ->select('id_user')
            ->where('id','=',$id)
            ->value('id_user');
        $user=DB::table('users')
            ->where('id','=',$banid)
            ->update(['ban'=>0]);
        Bans::find($id)->delete();
        return redirect('/admin');
    }
}

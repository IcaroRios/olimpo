<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\Models\Activity;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $users = User::where('active',1)->get();
        return  view("dashboard.users.usersIndex")->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'password'=>'required'
        ]);
        $request = $request->all();
        $request['password'] = bcrypt( $request['password']);     
        try{
            User::create($request);
            $activity = Activity::all()->last();
        } catch(\Illuminate\Database\QueryException $ex){ 
            // duplicate entry exception
            return redirect(URL::previous())->with('error','Utilize outro nome.');
        }
        return redirect(URL::previous());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return  view("dashboard.users.usersEdit")->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $user->name = $request['name'];
        if(isset( $request['password'] ))  {
            $request['password'] = bcrypt( $request['password']);          
            $user->password = $request['password'];
        }
        try {
            if($user->save()){
                return redirect(URL::previous())->with(['success' => 'ADM Editado!']);
                $activity = Activity::all()->last();
            }
            return redirect(URL::previous())->with(['error' => 'Não pode editar a ADM!']);
        }catch (\Illuminate\Database\QueryException $e) {
            return redirect(URL::previous())->with(['error' => 'Já existe uma ADM com este nome (talvez desativado)!']);
        }
    }

    /**
     * apenas desabilitando, nao vao ser deletados
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->desativate();
        $activity = Activity::all()->last();
        return redirect(URL::previous());
    }
}

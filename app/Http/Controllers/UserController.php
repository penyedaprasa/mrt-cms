<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->email_verified_at = $request->email_verified_at;
        $users->password = $request->password;
        $users->role_id = $request->role_id;
        $users->avatar = $request->avatar;
        $users->remember_token = $request->remember_token;
        $users->locked = $request->locked;
        $users->status = $request->status;
        $users->created_at = $request->created_at;
        $users->updated_at = $request->updated_at;
        $users->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Auth::check()){
            if(empty($request->id)){
                $user = Auth::user();
            } else {
                $user = User::findOrFail($request->id);
            }
            $user->name=$request->name;
            $user->email=$request->email;
            if(!empty($request->newpass)){
                $user->password=bcrypt($request->newpass);
            }
            
            if($request->file('avatar')){
                $path = $request->file('avatar')->store('public/profile');
                $filename='profile/'.basename($path);
                $user->avatar=$filename;                
            } 
              
            $user->save();
            $msg=array('status'=>true,'message'=>'Update Profil Sukses!');
            // return response()->json($msg);
            return redirect('/dashboard/profile');
        } else {
            return redirect('/login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

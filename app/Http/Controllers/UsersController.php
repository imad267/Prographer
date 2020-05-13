<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name'=>'required',
          'email'=>'required|email'
        ]);

        $user = User::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password'=>bcrypt('password')
        ]);

        $profile = Profile::create([
          'user_id'=>$user->id,
          'avatar'=>'uploads/avatars/default_avatar.jpg'
        ]);

        Session::flash('success','User created successfully');

        return redirect()->route('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function admin($id){
      $user = User::find($id);

      $user->admin = 1;
      $user->save();

      Session::flash('success','User is admin now.');

      return redirect()->back();
    }

    public function not_admin($id){
      $user = User::find($id);

      $user->admin = 0;
      $user->save();

      Session::flash('success','User is no longer admin.');

      return redirect()->back();
    }
}

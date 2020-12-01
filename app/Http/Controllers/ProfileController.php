<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(auth()->user()->id);
        return view('profile',compact('user','id'));
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'firstname' => 'required|max:50',
            'secondname' => 'required|max:50',
            'patronymic' => 'required|max:50',
            'phone' => 'required|regex:/(8)[0-9]{10}/',
            'passport' => 'required|regex:/[0-9]{2}( )[0-9]{2}( )[0-9]{6}/',
            'address' => 'required|max:100',
        ]);
        $user= User::find(auth()->user()->id);
        $id = auth()->user()->id;
        $user->name=$request->get('name');
        $user->email=$request->get('email');
        $user->firstname=$request->get('firstname');
        $user->secondname=$request->get('secondname');
        $user->patronymic=$request->get('patronymic');
        $user->birthdate=$request->get('birthdate');
        $user->phone=$request->get('phone');
        $user->gender=$request->get('gender');
        $user->passport=$request->get('passport');
        $user->address=$request->get('address');
        $user->save();
        return redirect()->action('ProfileController@show',$id);
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

    public function profile()
    {
        $user = User::find(auth()->user()->id);
        $id = auth()->user()->id;
        return view('profile',compact('user','id'));
    }

}

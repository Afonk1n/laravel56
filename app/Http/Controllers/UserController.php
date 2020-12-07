<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('editor/user/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return view('editor/user/create');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'name' => 'required|max:100',
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->save();

        return redirect('users')->with('Запись добавлена');*/
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
        $user = User::find($id);
        if($user->role == 2 || (auth()->user()->role == 1 && $user->role == 1)){
            return redirect('users');
        }
        return view('editor/user/edit',compact('user','id'));
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
        $user= User::find($id);
        if($request->photo){
            Storage::disk('public')->delete($user->photo);
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            Storage::disk('public')->put($photo->getFilename().'.'.$extension,  File::get($photo));
            $user->photo = $photo->getFilename().'.'.$extension;
        }
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
        if(Auth::check() && Auth::user()->role == 2){
            $user->role=$request->get('role');
        }
        $user->save();
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('users')->with('Запись удалена');
    }
}

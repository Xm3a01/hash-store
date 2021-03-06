<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
        return view('admins.dashboard.users.index' , ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data =  $this->validate($request , [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);

        $data['password']  = Hash::make($request->password);

        $user = User::create($data);

        if ($request->has('avatar')) {
            // $user->clearMediaCollection('avatars');
            $user->addMedia($request->avatar)->preservingOriginal()->toMediaCollection('avatars');
        }

        \Session::flash('success' , 'تم حفظ المستخدم بنجاح');
        return redirect()->route('users.index');
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
    public function edit(User $user)
    {
        return view('admins.dashboard.users.edit' , ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->except(['avatar' , 'password']));

        if($request->has('password') && $request->password != ''){
            $user->password = Hash::make($request->password);
            $user->save();
        }


        if ($request->hasFile('avatar')) {
            $user->clearMediaCollection('avatars');
            $user->addMedia($request->avatar)->preservingOriginal()->toMediaCollection('avatars');
        }

        \Session::flash('success' , 'تم تعديل المستخدم بنجاح');
        return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->clearMediaCollection('avatars');
        $user->delete();

        \Session::flash('success' , 'تم حذف المستخدم بنجاح');
        return redirect()->route('users.index');
    }
}

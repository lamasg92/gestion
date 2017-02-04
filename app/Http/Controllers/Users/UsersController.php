<?php

namespace App\Http\Controllers\Users;

use App\Entities\Role;
use App\Entities\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        //search options
        $users = User::name($request->get('name'))->orderby('id', 'ASC')->paginate();

        $users->each(function ($users){
            $users->role;
        });

        //dd($articles);
        return view('admin.users.index', compact('users'));
    }


    public function edit($id)
    {

        $roles =  Role::pluck('nombre', 'id');
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
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
        $user = new User([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'role_id' => $request['role_id'],
            'password' => bcrypt($request['password']),
        ]);

        $user->update();

        flash('Usuario Actualizado exitosamente!!', 'success');
        return redirect()->route('users.index');
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
        flash('Usuario borrado exitosamente!!', 'success');
        return redirect()->back();
    }

}

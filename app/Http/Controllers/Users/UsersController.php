<?php

namespace App\Http\Controllers\Users;

use App\Entities\Role;
use App\Entities\User;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

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
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        $user->save();

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

        try{
            $user->delete();
        }catch (Exception $e){
            flash('El Usuario tiene facturas asociadas!!', 'warning');
            return redirect()->back();
        };


        flash('Usuario borrado exitosamente!!', 'success');
        return redirect()->back();
    }

}

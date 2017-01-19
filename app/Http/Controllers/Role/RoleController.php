<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function create(){

        return view('roles.create');

    }
}

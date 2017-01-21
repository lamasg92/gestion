<?php

namespace App\Http\Controllers\Category;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{

    public function __construct()
    {
        //$this->middleware([ 'auth', 'admin'] ,['except' => 'logout']);
    }


    public function create(){

        return view('admin.categories.create');

    }

    public function store(Request $request){
        //validation
        $this->validate($request, [
            'nombre' => 'required'
        ]);
        //saves
       Category::create($request->all());

    }
}

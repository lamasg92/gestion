<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CreateCategoryController extends Controller
{
    public function create(){

        return view('categories.create');

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

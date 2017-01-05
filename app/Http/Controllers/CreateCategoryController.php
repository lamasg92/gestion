<?php

namespace App\Http\Controllers;

use App\Category;

class CreateCategoryController extends Controller
{
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
       $category =  Category::create($request->all());

        return $category->descripcion;
    }
}

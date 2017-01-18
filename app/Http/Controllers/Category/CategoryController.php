<?php


namespace App\Http\Controllers\Category;
use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();

        return view('admin.categories.index', compact('categories'));
    }

    public function edit()
    {

    }
}

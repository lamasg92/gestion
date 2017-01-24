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

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        // Flash::error
        return redirect()->route('categories.index');

    }
}

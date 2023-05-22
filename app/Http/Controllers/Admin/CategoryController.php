<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function getCategories()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json(['success' => true]);
    }
}

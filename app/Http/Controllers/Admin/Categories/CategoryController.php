<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
        $title = "Categories";
        $categories = Category::get();
        return view("admin.categories.index", compact('title', 'categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_name' => 'required|unique:categories|max:50',
            'home_page' => 'integer',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $image_name = $request->category_name . '.' . $request->image->extension();
        $request->image->move(public_path('admin_assets/uploade/categories'), $image_name);

        Category::create([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name, '-'),
            'home_page' => $request->home_page,
            'image' => $image_name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Created Successfully');
    }

    public function update(Request $request)
    {
        return $request;
    }

    public function destroy(Category $category)
    {
        //
    }
}

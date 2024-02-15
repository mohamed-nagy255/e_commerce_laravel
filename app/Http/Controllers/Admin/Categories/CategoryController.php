<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:categories-list'], ['only' => ['index']]);
        $this->middleware(['permission:category-create'], ['only' => ['store']]);
        $this->middleware(['permission:category-edit'], ['only' => ['update']]);
        $this->middleware(['permission:category-delete'], ['only' => ['destroy']]);
    }

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
        $id = $request->id;
        $image_request = $request->image;

        $request->validate([
            'category_name' => 'required|max:50|unique:categories,category_name,'.$id,
            'home_page' => 'integer',
        ]);

        $category =Category::where('id', $id)->first();

        if ($image_request != $category->image) {
            $image_path = public_path('admin_assets/uploade/categories/' . $category->image);

            if (is_file($image_path)) {
                unlink($image_path);
            }

            $image_name = $request->category_name . '.' . $image_request->extension();
            $image_request->move(public_path('admin_assets/uploade/categories'), $image_name);
        } else {
            $image_name = $image_request;
        }

        Category::where('id', $id)->update([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name, '-'),
            'home_page' => $request->home_page,
            'image' => $image_name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $image_path = public_path('admin_assets/uploade/categories/' . $request->image);
        if (is_file($image_path)) {
            unlink($image_path);
        }
        Category::where('id', $id)->delete();
        return redirect()->route('categories.index')->with('success', 'Category Deleted Successfully');
    }
}

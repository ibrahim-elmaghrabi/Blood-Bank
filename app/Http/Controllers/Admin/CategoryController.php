<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    public function  __construct()
    {
         $this->middleware('permission:category-list', ['only' => ['index']] );
         $this->middleware('permission:category-create', ['only' => ['create' , 'store']] );
         $this->middleware('permission:category-edit', ['only' => ['edit' , 'update']] );
         $this->middleware('permission:category-delete', ['only' => ['destroy']] );
    }

    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('status', 'Category Created Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('status', 'Category Updated Successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category Deleted Successfully');
    }
}

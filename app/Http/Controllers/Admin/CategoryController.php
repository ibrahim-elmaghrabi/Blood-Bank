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
         $this->middleware('permission:categories-list', ['only' => ['index']]);
         $this->middleware('permission:categories-create', ['only' => ['create' , 'store']]);
         $this->middleware('permission:categories-edit', ['only' => ['edit' , 'update']]);
         $this->middleware('permission:categories-delete', ['only' => ['destroy']]);
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

    public function update(CategoryRequest $request, Category $category)
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

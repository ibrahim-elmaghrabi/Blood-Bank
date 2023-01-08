<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function  __construct()
    {
         $this->middleware('permission:category-list' , ['only' => ['index']] );
         $this->middleware('permission:category-create' , ['only' => ['create' , 'store']] );
         $this->middleware('permission:category-edit' , ['only' => ['edit' , 'update']] );
         $this->middleware('permission:category-delete' , ['only' => ['destroy']] );
        
    }
    
    public function index()
    {
        $categories = Category::paginate();
        return view('admin.categories.index', ['categories' => $categories]);
    }

    
    public function create()
    {
        return view('admin.categories.create');
    }

     
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        Category::create($data);
        return redirect()->route('categories.index')->with('status', 'Category Created Successfully');
    }

    
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

  
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required'
        ]);
        $category->update($data);
        return redirect()->route('categories.index')->with('status', 'Category Updated Successfully');

    }

    
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('status', 'Category Deleted Successfully');

    }
}

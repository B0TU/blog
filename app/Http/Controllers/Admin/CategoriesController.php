<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $categories = Category::query();

        if ($search) {
            $categories->search($search);
        }
            $categories = $categories->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    public function create() {
        
        return view('admin.categories.create', [
            'category' => new Category()
        ]);
    }

    public function store(CategoryRequest $request){

        $category = new Category();
        $category->fill($request->validated());
        $category->save();

        return to_route('admin.categories.edit', $category);

    }

    public function show(Category $category){

        return view('admin.categories.show', compact('category'));

    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request){
        
        $category->fill($request->validated());
        $category->save();

        return to_route('admin.categories.index');
    }

    public function destroy(Category $category){

        $category->delete();

        return to_route('admin.categories.index');
    }

}
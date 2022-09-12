<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()
            ->approved()
            ->orderBy('published_at', 'desc')
            ->with('author', 'category')
            ->paginate(2);

        return view('web.categories.show', compact('category', 'posts'));
    }
}


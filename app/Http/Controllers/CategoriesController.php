<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()
            ->with('author','category')
            ->approved()
            ->orderBy('published_at', 'desc')
            ->paginate(2);
        
        // $posts = Post::with(['category:id,name,slug','author:id,name'])
        //     ->approved()
        //     ->orderBy('published_at', 'desc')
        //     ->paginate();

        return view('web.categories.show', compact('category', 'posts'));
    }
}


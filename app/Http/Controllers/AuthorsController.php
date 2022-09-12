<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorsController 
{

    public function show(User $author)
    {
        $posts = $author->posts()
            ->approved()
            ->orderBy('published_at', 'desc')
            ->with('author')
            ->paginate(2);
            
        return view('web.authors.show', compact('author', 'posts'));
    }

}
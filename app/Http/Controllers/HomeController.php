<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()
                    ->approved()
                    ->orderBy('published_at', 'desc')
                    ->paginate(2);

        return view('web.home.index', compact('posts'));
    }
}

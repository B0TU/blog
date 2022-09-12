<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::query()
                    // ->select('id','category_id','author_id','title','content','created_at')
                    ->approved()
                    ->orderBy('published_at', 'desc')
                    ->paginate(2);

        return view('web.home.index', compact('posts'));
    }
}

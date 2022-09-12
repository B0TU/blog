<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        $postNotApproved = $post->state->value != 'approved';
        
        abort_if($postNotApproved, 404);

        return view('web.posts.show', compact('post'));
    }
}




        /*if ($post->state->value != 'approved') {
            abort(404);
        }*/

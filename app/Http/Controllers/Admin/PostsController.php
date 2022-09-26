<?php

namespace App\Http\Controllers\Admin;

use App\Charts\PostsChart;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    public function index(Request $request, PostService $postService)
    {
        $posts = $postService->search($request->all());
        $posts = $posts->with('author', 'category')->orderBy('id','desc')->paginate(5);
        $authors = User::select('id', 'name')->get();

        return view('admin.posts.index', compact('posts', 'authors'));
    }

    public function create() {

        return view('admin.posts.create', [
            'post' => new Post(),
            'categories' => Category::select('id', 'name')->get()
        ]);
    }

    public function store(PostRequest $request, PostService $postService) 
    {
        $post = $postService->store($request->validated());
        return to_route('admin.posts.edit', $post);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::select('id', 'name')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Post $post, PostRequest $request, PostService $postService)
    {
        $post = $postService->update($post, $request->validated());
        return to_route('admin.posts.edit', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('admin.posts.index');
    }

    public function statusUpdate(Post $post, Request $request, PostService $postService)
    {
        $post = $postService->statusUpdate($post, $request->action);
        return to_route('admin.posts.show', $post);
    }

}

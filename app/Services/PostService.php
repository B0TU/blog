<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostService
{
    use AuthorizesRequests;
    
    public function search(array $search_data = null)
    {
        $search = data_get($search_data, 'search');
        $author = data_get($search_data, 'author');
        
        $posts = Post::query()->scopeToCurrentUser();

        if ($search) {
            $posts->search($search);
        }

        if ($author) {
            $posts->where('author_id', $author);
        }

        return $posts;

    }

    public function store(array $postData): Post
    {
        $post = new Post();

        $post->fill($postData);
        $post->author()->associate(auth()->user());
        $post->category()->associate(data_get($postData, 'category'));

        $post->save();

        return $post;

    }

    public function update(Post $post, array $postData): Post
    {
        $post->fill($postData);
        $post->category()->associate(data_get($postData, 'category'));
        $post->save();

        return $post;

    }

    public function statusUpdate(Post $post, string $action): Post
    {
        switch ($action) {
            case 'draft';
                $post->draft();
                break;
            case 'pending';
                $post->pending();
                break;
            case 'approve';
                $this->authorize('approve posts');
                $post->approve();
                break;
        }

        $post->{$action}();

        return $post;

    }

}
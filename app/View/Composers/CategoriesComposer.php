<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;


class CategoriesComposer
{
    public function categories()
    {
        return Category::withCount([ 
            'posts' => function ($query) {
                $query->approved();
            }
        ])->has('posts')->get();

    }

    public function compose(View $view)
    {
        $view->with('categories', $this->categories());
    }
}
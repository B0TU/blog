<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show(Page $page)
    {
        $pageNotPublished = $page->state->value != 'published';
        
        abort_if($pageNotPublished, 404);
        
        return view('web.pages.show', compact('page'));
    }
}


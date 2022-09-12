<?php

namespace App\View\Composers;

use Illuminate\View\View;

class TitleComposer
{
    public function title()
    {
        if (request()->segment(1) != '') {
            return ucfirst(str(request()->segment(1))->singular()) . ' | ' . ucwords(str_replace(str_split('%20-'), ' ', request()->segment(2)));
        }
    }
    
    public function compose(View $view)
    {
        $view->with('title', $this->title());
    }
}

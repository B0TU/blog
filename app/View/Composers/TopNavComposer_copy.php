<?php

namespace App\View\Composers;

use App\Models\Page;
use Illuminate\View\View;
use App\Support\Enums\PageSection;
use Illuminate\Support\Collection;


class TopNavComposer
{
    protected Collection $pages;

    public function __construct()
    {
        $this->pages = Page::query()
            ->select('title', 'slug', 'order', 'section', 'id', 'state')
            ->published()
            ->get();

        // $this->pages = Page::all();
    }

    public function footerPages()
    {
        $pages = clone $this->pages;
        return $pages->filter(function ($page) {
            return $page->section == PageSection::Footer || $page->section == PageSection::All;
        })
        ->sortBy(function ($page) {
            return $page->order;
        });
    }

    public function headerPages()
    {
        $pages = clone $this->pages;
        return $pages->filter( function ($page) {
            return $page->section == PageSection::Header || $page->section == PageSection::All;
        })
        ->sortBy( function ($page) {
            return $page->order;
        });

    }

    public function compose(View $view)
    {

        $view->with([
            'header_pages' => $this->headerPages(),
            'footer_pages' => $this->footerPages(),
        ]);
    }

}
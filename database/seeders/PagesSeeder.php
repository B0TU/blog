<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use App\Support\Enums\PageSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PagesSeeder extends Seeder
{

    protected array $pages_data = [
        [
            'title' => 'About',
            'slug' =>   'about',
            'order' => 1,
            'content' => 'About Page',
            'section' => PageSection::All
        ],
        [
            'title' => 'Contact',
            'slug' =>   'about',
            'order' => 2,
            'content' => 'Contact Page',
            'section' => PageSection::All
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ( $this->pages_data as $page_data ) {
            $page = Page::where('slug', str($page_data['title']))->first();

            if ( ! $page ) {
                $page = new Page();
            }

            $page->title = $page_data['title'];
            $page->order = $page_data['order'];
            $page->content = $page_data['content'];
            $page->section = $page_data['section'];
            $page->save();

        }
    }
}

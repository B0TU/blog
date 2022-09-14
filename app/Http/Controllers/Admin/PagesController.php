<?php

namespace app\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Support\Enums\PageState;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Enum;


class pagesController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Page::class);
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        $pages = Page::query();

        if ($search) {
            $pages->search($search);
        }
            $pages = $pages->paginate(5);

        return view('admin.pages.index', compact('pages'));
    }

    public function create() {
        
        return view('admin.pages.create', [
            'page' => new Page()
        ]);
    }

    public function store(PageRequest $request){

        $page = new Page();
        $page->fill($request->validated());
        $page->save();

        return to_route('admin.pages.edit', $page);

    }

    public function show(Page $page){

        return view('admin.pages.show', compact('page'));

    }

    public function edit(Page $page){
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Page $page, PageRequest $request){
        
        $page->fill($request->validated());
        $page->save();

        return to_route('admin.pages.index');
    }

    public function destroy(Page $page){

        $page->delete();

        return to_route('admin.pages.index');
    }

    public function stateUpdate(Page $page, Request $request)
    {
        $request->validate([
            'action' => [new Enum(PageState::class)]
        ]);

        $action = $request->get('action');

        switch ($action) {
            case 'unpublished':
                $page->unpublish();
                break;

            case 'published':
                $page->publish();
                break;
        }

        // $page->{$action}();

        return to_route('admin.pages.show', $page);

    }

}
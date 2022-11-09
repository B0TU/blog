<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class ChartService {

    public function __construct(Request $request)
    {
        $this->year = $request->get('year') ?? date('Y');
    }


    public function posts()
    {

        return Post::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $this->year)
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('m', $item->month)->format('F'),
                    'count' => $item->count
                ];
        });
    }

    public function categories()
    {

        return Category::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $this->year)
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('m', $item->month)->format('F'),
                    'count' => $item->count
                ];
        });
    }

    public function roles()
    {
        
        return Role::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $this->year)
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('m', $item->month)->format('F'),
                    'count' => $item->count
                ];
        });
    }

    public function users()
    {

        return User::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $this->year)
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('m', $item->month)->format('F'),
                    'count' => $item->count
                ];
        });
    }

    public function pages()
    {
        
        return Page::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $this->year)
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('m', $item->month)->format('F'),
                    'count' => $item->count
                ];
        });
    }

    public function logs()
    {

        return Activity::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $this->year)
            ->groupBy('month', 'year')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get()->map(function ($item) {
                return [
                    'month' => Carbon::createFromFormat('m', $item->month)->format('F'),
                    'count' => $item->count
                ];
        });
    }

    public function years()
    {
        return Post::selectRaw('DATE_FORMAT(created_at, "%Y") as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

            return [
                '2022'
            ];
    }

}
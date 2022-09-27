<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;

class ChartService {

    public function posts(Request $request)
    {
        $filterDate = $request->get('year');
        $year = $filterDate ?? date("Y");

        return Post::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $year)
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

    public function categories(Request $request)
    {
        
        $filterDate = $request->get('year');
        $year = $filterDate ?? date("Y");

        return Category::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $year)
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

    public function logs(Request $request)
    {
        
        $filterDate = $request->get('year');
        $year = $filterDate ?? date("Y");

        return Activity::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
            ->whereYear('created_at', $year)
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
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Models\Activity;
use App\Models\Category;
use App\Charts\GenericChart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $filterDate = $request->get('year');
        $year = $filterDate ?? date("Y");

        $logs = Post::selectRaw('DATE_FORMAT(created_at, "%m") as month, DATE_FORMAT(created_at, "%Y") as year, count(*) as count')
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

            $years = Post::selectRaw('DATE_FORMAT(created_at, "%Y") as year')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();


        $chart = new GenericChart;
        $chart->labels($logs->pluck('month'));
        //$chart->labels($logs->pluck('year'));
        // $chart->dataset('Posts', 'bar', [$posts_2_days_ago, $yesterday_posts, $today_posts])->options(['backgroundColor' => '#CB4335']);
        // $chart->dataset('Categories', 'bar', [$categories_2_days_ago, $yesterday_categories, $today_categories])->options(['backgroundColor' => '#1F618D']);
        // $chart->dataset('Roles', 'bar', [$roles_2_days_ago, $yesterday_roles, $today_roles])->options(['backgroundColor' => '#F1C40F']);
        // $chart->dataset('Users', 'bar', [$users_2_days_ago, $yesterday_users, $today_users])->options(['backgroundColor' => '#27AE60']);
        // $chart->dataset('Pages', 'bar', [$pages_2_days_ago, $yesterday_pages, $today_pages])->options(['backgroundColor' => '#884EA0']);
        $chart->dataset('Posts', 'bar', $logs->pluck('count'))->options(['backgroundColor' => '#4285F4']);


        return view('admin.dashboard.index', compact('chart', 'years'));
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Charts\GenericChart;
use App\Http\Controllers\Controller;
use App\Services\ChartService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request, ChartService $chartService)
    {

        $years = $chartService->years();

        $chart = new GenericChart;
        $chart->labels($chartService->posts($request)->pluck('month'));
        $chart->dataset('Posts', 'bar', $chartService->posts($request)->pluck('count'))->options(['backgroundColor' => '#4285F4']);
        $chart->dataset('Categories', 'bar', $chartService->categories($request)->pluck('count'))->options(['backgroundColor' => '#F1C40F']);
        $chart->dataset('Roles', 'bar', $chartService->roles($request)->pluck('count'))->options(['backgroundColor' => '#F1R465']);
        $chart->dataset('Users', 'bar', $chartService->users($request)->pluck('count'))->options(['backgroundColor' => '#0F9D58']);
        $chart->dataset('Pages', 'bar', $chartService->pages($request)->pluck('count'))->options(['backgroundColor' => '#Y4R465']);
        $chart->dataset('Logs', 'bar', $chartService->logs($request)->pluck('count'))->options(['backgroundColor' => '#CB4335']);

        return view('admin.dashboard.index', compact('chart', 'years'));
    }

}
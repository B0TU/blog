<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityLogsController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Activity::class);
    }

    public function index(Request $request)
    {
        $activities = Activity::query();
        
        $activities->when($request->get('search'), function ($query, $search){
            $query->search($search);
        });

        $activities = $activities->orderBy('id','desc')->paginate(5);

        return view('admin.activities.index', compact('activities'));
    }

    public function show(Activity $activity)
    {
        return view('admin.activities.show', compact('activity'));
    }
}

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ActivityLogsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;

Route::group([
    'middleware' => 'auth'
], function (){

    Route::get('/', function () {
        return to_route('admin.dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Route::view('dashboard', 'admin.dashboard.index')->name('dashboard');

    Route::resources([
        'posts'      => PostsController::class,
        'categories' => CategoriesController::class,
        'users'      => UsersController::class,
        'roles'      => RolesController::class,
        'pages'      => pagesController::class,
    ]);


    Route::patch('posts/{post}/state-update', [PostsController::class, 'statusUpdate'])->name('posts.state-update');
    Route::patch('pages/{page}/state-update', [PagesController::class, 'stateUpdate'])->name('pages.state-update');

    /**
     * Activty Log
     */

     Route::get('activity-logs', [ActivityLogsController::class, 'index'])->name('activities.index');
     Route::get('activity-logs/{activity}', [ActivityLogsController::class, 'show'])->name('activities.show');

});
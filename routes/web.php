<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard/search', [DashboardController::class, 'search']);

Route::get('/', function () {
    return view('welcome');
});

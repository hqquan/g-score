<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('/search')->as('search.')->group(function () {
    Route::get('/', [SearchController::class, 'index'])->name('index');
    Route::post('/', [SearchController::class, 'search'])->name('search');
});

Route::prefix('/report')->as('report.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::post('/', [ReportController::class, 'handle'])->name('handle');
});
<?php

use App\Http\Controllers\ScenarioController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::resource('scenarios', ScenarioController::class);

Route::post('/scenarios/run', [ScenarioController::class, 'run'])->name('scenarios.run');

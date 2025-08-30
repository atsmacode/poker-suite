<?php

use App\Http\Controllers\Games\GameController;
use App\Http\Controllers\Scenarios\ScenarioController;
use App\Http\Controllers\Scenarios\ScenarioPlayerController;
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

Route::resource('scenarios', ScenarioController::class)->except('show');

Route::prefix('scenarios')->name('scenarios.')->group(function () {
    Route::post('/setup', [ScenarioController::class, 'setup'])->name('setup');

    Route::prefix('players')->name('players.')->group(function() {
        Route::post('/', [ScenarioPlayerController::class, 'store'])->name('store');
        Route::delete('/{player}', [ScenarioPlayerController::class, 'destroy'])->name('destroy');
    });
});

Route::resource('games', GameController::class)->except(['edit', 'update']);

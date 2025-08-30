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

Route::prefix('scenarios')->name('scenarios.')->group(function () {
    Route::get('/create', [ScenarioController::class, 'create'])->name('create');
    Route::delete('/destroy/{scenario}', [ScenarioController::class, 'create'])->name('destroy');
    Route::post('/draft', [ScenarioController::class, 'saveDraft'])->name('save_draft');
    Route::get('/{scenario}/edit', [ScenarioController::class, 'edit'])->name('edit');
    Route::get('/', [ScenarioController::class, 'index'])->name('index');
    Route::patch('/{scenario}', [ScenarioController::class, 'update'])->name('update');
    Route::post('/setup', [ScenarioController::class, 'setup'])->name('setup');

    Route::prefix('players')->name('players.')->group(function() {
        Route::post('/', [ScenarioPlayerController::class, 'store'])->name('store');
        Route::delete('/{player}', [ScenarioPlayerController::class, 'destroy'])->name('destroy');
    });
});

Route::resource('games', GameController::class)->except(['edit', 'update']);

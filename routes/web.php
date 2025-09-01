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

Route::prefix('scenarios')
    ->name('scenarios.')
    ->controller(ScenarioController::class)
    ->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::delete('/{scenario}', 'destroy')->name('destroy');
        Route::patch('/{scenario}/draft', 'draft')->name('draft');
        Route::get('/{scenario}/edit', 'edit')->name('edit');
        Route::get('/', 'index')->name('index');
        Route::patch('/{scenario}', 'update')->name('update');
        Route::post('/setup', 'setup')->name('setup');

        Route::prefix('{scenario}/players')->name('players.')->group(function() {
            Route::post('/', [ScenarioPlayerController::class, 'store'])->name('store');
            Route::delete('/{player}', [ScenarioPlayerController::class, 'destroy'])->name('destroy');
        });
    });

Route::resource('games', GameController::class)->except(['edit', 'update']);

<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');

Route::view('/dashboard', 'dashboard')->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('movies')->group(function() {

    Route::get('/', [MovieController::class, 'index'])->name('movie.index');

});
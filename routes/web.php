<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

// Homepage
Route::get('/', [MovieController::class, 'index'])->name('movie.index');

// Movies
Route::prefix('movies')->group(function() {

    Route::get('/', [MovieController::class, 'index'])->name('movie.index');
    Route::get('/{movie:slug}', [MovieController::class, 'show'])->name('movie.show');

});

Route::middleware(['auth'])->group(function () {
    
    // Users profile page -> mettere username or fullname
    Route::get('profile/{user:username}', [UserProfileController::class, 'show'])->name('profile.show');

    // Dashboard Routes
    Route::prefix('dashboard')->group(function() {
        // Dashboard Index
        Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');

        // Dashboard Movies
        Route::view('/movies/reviews', 'dashboard.movies.reviews')->name('dashboard.movies.reviews');
        Route::get('/movies/reviews/{review:id}/edit', [ReviewController::class, 'edit'])->name('dashboard.movies.reviews.edit');
        
        Route::view('/movies/watchlist', 'dashboard.movies.watchlist')->name('dashboard.movies.watchlist');

        // Dashboard Settings
        Route::view('/settings/image', 'dashboard.settings.image')->name('dashboard.settings.image');
        Route::view('/settings/profile', 'dashboard.settings.profile')->name('dashboard.settings.profile');
        Route::view('/settings/account', 'dashboard.settings.account')->name('dashboard.settings.account');
        Route::view('/settings/password', 'dashboard.settings.password')
            ->middleware('password.confirm') // Extra security
            ->name('dashboard.settings.password');

        // Dashboard Badges
        Route::view('/badges/help', 'dashboard.badges.badges-help')->name('dashboard.badges.help');
        Route::view('/badges/my-badges', 'dashboard.badges.my-badges')->name('dashboard.badges.my-badges');
    });
    
});
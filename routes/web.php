<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Storycontroller;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard', [Storycontroller::class, 'index'])->name('dashboard');
Route::get('/dashboard/{id}', [Storycontroller::class, 'viewStory'])->name('viewStory');

Route::get('/newdashboard', [HomeController::class, 'index'])->name('newdashboard');
Route::post('/store', [Storycontroller::class, 'store'])->name('stories.store');
Route::get('/home', [HomeController::class, 'showAllStories'])->name('home');


// Testing for navlink
// Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
// Route::get('/stories', [ProfileController::class, 'edit'])->name('stories');
// Route::get('/settings', [ProfileController::class, 'edit'])->name('settings');
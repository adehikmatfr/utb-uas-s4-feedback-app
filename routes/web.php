<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return view('welcome');
})->middleware(RedirectIfAuthenticated::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes that do not require authentication
Route::get('/feedback/create/{token}', [FeedbackController::class, 'createWithToken'])->name('feedback.create.with.token');
Route::post('/feedback/store', [FeedbackController::class, 'storeWithToken'])->name('feedback.store.with.token');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::resource('feedbacks', FeedbackController::class);
});

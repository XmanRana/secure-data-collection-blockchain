<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    // Data Collection Routes
    Route::get('/data/create', [App\Http\Controllers\DataCollectionController::class, 'create'])->name('data.create');
    Route::post('/data/store', [App\Http\Controllers\DataCollectionController::class, 'store'])->name('data.store');
    
    // ✅ Success page MUST come BEFORE dynamic route
    Route::get('/data/success', function() {
        return view('data-collection.success');
    })->name('data.success');
    
    // ✅ Dynamic route AFTER specific routes
    Route::get('/data/{dataSubmission}', [App\Http\Controllers\DataCollectionController::class, 'show'])->name('data.show');
});

require __DIR__.'/auth.php';

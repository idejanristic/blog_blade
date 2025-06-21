<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

require __DIR__ . '/public/routes.php';

require __DIR__ . '/dashboard/routes.php';

Route::middleware('auth')->group(function (): void {
    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name(name: 'profile.edit');
    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name(name: 'profile.update');
    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name(name: 'profile.destroy');
});

require __DIR__ . '/auth.php';

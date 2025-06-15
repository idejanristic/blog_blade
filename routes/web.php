<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\PagesController;

Route::prefix('/')->name('public.')
    ->group(callback: function (): void {
        Route::get(
            uri: '/',
            action: [PagesController::class, 'home']
        )->name(name: 'home');

        Route::get(
            uri: '/about',
            action: [PagesController::class, 'about']
        )->name(name: 'about');

        Route::get(
            uri: '/contact',
            action: [PagesController::class, 'contact']
        )->name(name: 'contact');
    });

Route::get(
    '/dashboard',
    function (): View {
        return view('dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');


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

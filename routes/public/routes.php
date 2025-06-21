<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PagesController;
use App\Http\Controllers\Public\ArticlesController;


Route::prefix('/')
    ->name('public.')
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

        Route::resource(
            name: 'articles',
            controller: ArticlesController::class
        );

        Route::get(
            uri: 'articles/user/{user}',
            action: [ArticlesController::class, 'user']
        )->name(name: 'articles.user');
    });

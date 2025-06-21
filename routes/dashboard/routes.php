<?php

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;


Route::get(
    '/dashboard',
    function (): View {
        return view('dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');

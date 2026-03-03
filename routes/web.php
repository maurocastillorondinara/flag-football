<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/modalidades', [PageController::class, 'modalidades'])->name('modalidades');
Route::get('/equipos', [PageController::class, 'equipos'])->name('equipos');
Route::get('/historia', [PageController::class, 'historia'])->name('historia');

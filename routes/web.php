<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/equipos', [PageController::class, 'equipos'])->name('equipos');
Route::get('/la-liga', [PageController::class, 'laLiga'])->name('la-liga');

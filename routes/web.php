<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::get('/pizze', [PizzaController::class, 'index'])->name('pizze');
Route::get('/pizza/{id}', [PizzaController::class, 'show'])->name('details');
Route::delete('pizza/{id}', [PizzaController::class, 'destroy'])->name('destroy');

Route::get('/pizza/{id}/edit', [PizzaController::class, 'edit'])->name('edit');
Route::put('pizza/{id}', [PizzaController::class, 'update'])->name('update');

Route::view('/create-pizza', 'pages.create')->name('create');
Route::post('/pizza', [PizzaController::class, 'store'])->name('store');

Route::get('/search', [PizzaController::class, 'index'])->name('search');

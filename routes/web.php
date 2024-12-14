<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/categories/create', function () {
    return view('categories.create');
})->name('categories.create');

Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');

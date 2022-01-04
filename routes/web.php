<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\BlogController;
use Illuminate\Support\Facades\Route;


Route::namespace('Site')->group(function () {
    Route::get('/', [HomeController::class, '__invoke'])->name('site.home');

    Route::get('produtos', [CategoryController::class, 'index'])->name('site.products');
    Route::get('produtos/{category:slug}', [CategoryController::class, 'show'])->name('site.products.category');

    Route::get('blog', [BlogController::class, '__invoke'])->name('site.blog');

    Route::view('sobre', 'site.about.index')->name('site.about');

    Route::get('contato', [ContactController::class, 'index'])->name('site.contact');
    Route::post('contato', [ContactController::class, 'form'])->name('site.contact.form');
});

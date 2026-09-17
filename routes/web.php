<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonialController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/blog/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

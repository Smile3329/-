<?php

use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/contact/all/{id}/delete', [ContactController::class, 'deleteMessage'])->name('contact-delete');
Route::get('/contact/all/{id}/change', [ContactController::class, 'changeMessage'])->name('contact-change');
Route::get('/contact/all/{id}', [ContactController::class, 'details'])->name('contact-data-details');
Route::get('/contact/all', [ContactController::class, 'allData'])->name('contact-data');

Route::post('/contact/all/{id}/change', [ContactController::class, 'changeMessageSubmit'])->name('contact-change-submit');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form');

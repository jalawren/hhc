<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/philosophy', function () {
    return view('philosophy');
})->name('philosophy');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/links', function () {
    return view('links');
})->name('links');

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

/**
 * Home Page
 */
Route::get('/', function () {
    return view('about');
})->name('home');

/**
 * About Page
 */
Route::get('/about', function () {
    return view('about');
})->name('about');

/**
 * Philosophy Page
 */
Route::get('/philosophy', function () {
    return view('philosophy');
})->name('philosophy');

/**
 * Contact Page
 */
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/**
 * Resource Controller
 */
Route::resource('/resources', 'ResourceController');

/**
 * Blog Controller
 */
Route::get('/blog/tag/{id}', 'PostController@indexByTag');
Route::resource('/blog', 'PostController');

/**
 * Tag Controller
 */
Route::resource('/tags', 'TagController');


/**
 *
 * Auth Routes
 */
Auth::routes();

Route::get('/home', 'HomeController@index');



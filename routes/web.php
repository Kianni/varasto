<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('welcome','PostsController@welcome');
$name = 'arvoisa Asiakas';
Route::get('/', function () use($name) {
    return view('welcome', ['name'=>$name]);
});

Route::get('/about', function () {
    return view('about');
})->name('knowAboutUs');

Route::view('service', 'service',[
    'services'=>['Training', 'Consulting', 'Development']]);

Route::get('/x', function () {
    return view('secret');
});


Route::prefix('posts')->group( function() {
    Route::get('', 'PostsController@showAllPosts');
    Route::get('/create', 'PostsController@create');
    Route::post('/create', 'PostsController@addPost');
    Route::get('/post/{id}', 'PostsController@getPost');
    Route::get('/edit/{keyNumber?}', 'PostsController@changePost');
    Route::post('/edit', 'PostsController@updatePost');

    
});


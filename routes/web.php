<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', function(){
//     $posts='';
//     return view('dashboard')->with('posts', $posts);
// });

Route::get('/home', 'PostController@index');

Route::get('/posts', 'PostController@index')->name('allposts');

Route::post('/posts/create', 'PostController@create');

//show the update form
Route::get('/updateform','PostController@edit')->name('editpost');

Route::put('/posts/{post}','PostController@update')->name('updatepost');

Route::get('/posts/{post}', 'PostController@destroy')->name('delete_post');


Route::get('/profile/{profile}/edit', 'ProfileController@edit')->name('editprofile');


Route::get('/profile', function(){
    return view('account');
})->name('profile');

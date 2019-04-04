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

/*
Route::get('/hello', function () {
    //return view('welcome');
    return '<h1>Hello World</h1>';
});

Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});
*/  

Route::get('/', 'PagesController@index');

Route::resource('posts', 'PostsController');

Route::resource('comments', 'CommentsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

//Admin Routes
Route::prefix('admin')->group(function(){

  Route::get('/','AdminController@index');

  Route::get('/posts','AdminController@posts');

  Route::get('/post/{id}','AdminController@post');

  Route::get('/users','AdminController@users');

  Route::get('/users/{id}/posts','AdminController@userPosts');

  Route::get('/comments','AdminController@comments');

  Route::post('/comments/{id}/create','AdminController@addComment');

});

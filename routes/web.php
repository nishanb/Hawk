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

Route::get('/login',function()
{
    return view('user.auth.login');
});



Auth::routes();

Route::get('/','PagesController@index');

Route::get('/home','PagesController@dashboard');

Route::resource('posts', 'PostsController');

Route::resource('comments', 'CommentsController');

Route::get('/dashboard', 'DashboardController@index');

Route::post('admin/comments/{id}/create','AdminController@addComment');

//Admin Routes
Route::group([
              'prefix'=>'admin',
              'middleware'=>'admin'
              ],function(){

  Route::get('/','AdminController@index');

  Route::get('/posts','AdminController@posts');

  Route::get('/posts/{id}','AdminController@showPost');

  Route::get('/users','AdminController@users');

  Route::get('/users/{id}','AdminController@showUser');

  Route::get('/comments','AdminController@comments');

  Route::get('block/{type}/{id}/{status}','AdminController@toggleBlockContent');

  Route::get('comments/{id}','AdminController@showComment');

  Route::get('profile','AdminController@profile');

});

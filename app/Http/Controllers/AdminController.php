<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class AdminController extends Controller
{

  public function index(){

      return view('admin.pages.index');//->with();
  }

  public function posts(){
    $posts=Post::all();
    return view('admin.pages.posts')->with('posts',$posts);
  }

  public function post($id){
      $posts=Post::all();
      return view('admin.pages.post')->with('posts',$posts);
  }

  public function users(){
      $users = User::all();
      return view('admin.pages.users')->with('users',$users);
  }

  public function userPosts($id){
    $user = User::find($id);

    return view('admin.pages.userposts')->with('posts',$user->posts)
    ->with('userName',$user->name);
  }

  public function comments(){
      return view('admin.pages.comments');
  }

}

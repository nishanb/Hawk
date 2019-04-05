<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use DB;

class AdminController extends Controller
{
  //array to store count of stats
  public $data;

  //constructor
  public function __construct(){

    $this->data=array('totalUsers' => count(User::all()),
                'totalPosts' => count(Post::all()),
                'totalComments' => count(Comment::all()),
                'blockedPosts' => count(Post::all()->where('status','=',0))
            );
  }

  //index page of admin panel
  public function index(){
      $posts=Post::orderBy('created_at','desc')->take(5)->get();
      $comments=Comment::orderBy('created_at','desc')->take(5)->get();

      return view('admin.pages.index')->with('data',$this->data)
      ->with('posts',$posts)
      ->with('comments',$comments);
  }

  //listing all user posts
  public function posts(){
    $posts=Post::all();
    return view('admin.pages.posts')->with('posts',$posts)
          ->with('data',$this->data);
  }

  //viewing post,comment and it's insight
  public function post($id){
      $post=Post::find($id);

      return view('admin.pages.post')->with('post',$post)
      ->with('comments',$post->comments);
  }

  //listing all the users
  public function users(){
      $users = User::all();
      return view('admin.pages.users')->with('users',$users)
      ->with('data',$this->data);
  }

  //listing a posts of a particular user
  public function userPosts($id){
    $user = User::find($id);

    return view('admin.pages.userposts')->with('posts',$user->posts)
    ->with('userName',$user->name);
  }

  //listing all comments
  public function comments(){
      $comments=Comment::all();

      return view('admin.pages.comments')->with('comments',$comments)
      ->with('data',$this->data);

  }

  //block user,post,comment
  public function toggleBlockContent($type,$id,$status){
    //select content type
    if($type=="post"){
      $data=Post::find($id);
    }elseif ($type=="comment") {
      $data=Comment::find($id);
    }else {
      $data=User::find($id);
    }

    //toggle status
    if($status){
      $data->status=0;
    }
    else {
      $data->status=1;
    }

    //update status
    $data->save();

    //return back with notification
    return redirect()->back()->with('status',$type." is blocked");
  }

}

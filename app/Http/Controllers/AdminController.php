<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Insight;

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
    $posts=Post::orderBy('created_at','desc')->get();
    return view('admin.pages.posts')->with('posts',$posts)
          ->with('data',$this->data);
  }

  //viewing post,comment and it's insight
  public function showpost($id){
      $post=Post::find($id);

      $insight=Insight::find($post->insight_id);

      $emotions=[(float)$insight->bored*100,
                 (float)$insight->sad*100,
                 (float)$insight->angry*100,
                 (float)$insight->happy*100,
                 (float)$insight->fear*100,
                 (float)$insight->excited*100
               ];
      $sentiments=[$insight->positive*100,
                   $insight->negative*100,
                   $insight->neutral*100];

      return view('admin.pages.post')->with('post',$post)
      ->with('comments',$post->comments)
      ->with('insight',$insight)
      ->with('user',$post->user)
      ->with('emotions',$emotions)
      ->with('sentiments',$sentiments);

  }

  //listing all the users
  public function users(){
      $users = User::orderBy('created_at','desc')->get();
      return view('admin.pages.users')->with('users',$users)
      ->with('data',$this->data);
  }

  //listing a posts of a particular user
  public function showUser($id){
    $user = User::find($id);

    $pos=0;
    $neg=0;
    $neutral=0;

    foreach ($user->comments as $comment) {

        if($comment->insights->sentiment_type==0){
          ++$neg;
        }elseif ($comment->insights->sentiment_type==1) {
          ++$pos;
        }else{
          ++$neutral;
        }
    }

    foreach ($user->posts as $comment) {
        if($comment->insights->sentiment_type==0){
          ++$neg;
        }elseif ($comment->insights->sentiment_type==1) {
          ++$pos;
        }else{
          ++$neutral;
        }
    }

    $data=[$pos,$neg,$neutral];

    return view('admin.pages.user')->with('posts',$user->posts)
    ->with('userName',$user->name)
    ->with('user',$user)
    ->with('comments',$user->comments)
    ->with('data',$data);
  }

  //listing all comments
  public function comments(){
      $comments=Comment::orderBy('created_at','desc')->get();

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
      if($status==0){
        $data->violations=3;
      }
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

  //comment and its insights
  public function showComment($id){

    $comment=Comment::find($id);

    $insight=Insight::find($comment->insight_id);

    $emotions=[(float)$insight->bored*100,
               (float)$insight->sad*100,
               (float)$insight->angry*100,
               (float)$insight->happy*100,
               (float)$insight->fear*100,
               (float)$insight->excited*100
             ];

    $sentiments=[$insight->positive*100,
                 $insight->negative*100,
                 $insight->neutral*100];

      return view('admin.pages.comment')->with('comment',$comment)
      ->with('emotions',$emotions)
      ->with('sentiments',$sentiments);
      ;
  }

  public function profile()
  {
      $user=User::find(auth()->user()->id);
      return view('admin.pages.profile')->with('user',$user);
  }

}

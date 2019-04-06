<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Comment;
use DB;
use App\Insight;
use App\User;

//parallel dots plugin
require(base_path().'/app/functions/API.php');

class PostsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();

        $posts = Post::orderBy('created_at','desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;

        //create insight
        $insight=new Insight;
        //get data from sentimental model
        $abuse=json_decode(abuse(strip_tags($post->body)));
        $emotion=json_decode(emotion(strip_tags($post->body)));
        $sentiment=json_decode(sentiment(strip_tags($post->body)));
        //abuse type
        $insight->abuse_type=$abuse->type;
        $insight->abuse_tags=implode(",",$abuse->tags);
        //emotions
        $insight->bored=$emotion->emotion->Bored;
        $insight->sad=$emotion->emotion->Sad;
        $insight->angry=$emotion->emotion->Angry;
        $insight->happy=$emotion->emotion->Happy;
        $insight->fear=$emotion->emotion->Fear;
        $insight->excited=$emotion->emotion->Excited;
        //sentiment
        $insight->sentiment_type=$sentiment->type;
        $insight->positive=$sentiment->sentiment->positive;
        $insight->negative=$sentiment->sentiment->negative;
        $insight->neutral=$sentiment->sentiment->neutral;
        //blocking of post
        if($insight->sentiment_type==0){
          $post->status=0;
          //blocking user
          $user=User::find($post->user_id);
          $user->violations=$user->violations+1;
          //block if violation greater than 3
          if($user->violations>3){
            $user->status=0;
          }
          $user->save();
          }
        //save insight
        $insight->save();
        //save post
        $post->insight_id=$insight->id;
        $post->save();
        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show_n')
        ->with('post', $post)
        ->with('comments',$post->comments);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

         // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        //insight of a post
        $insight=Insight::find($post->insight_id);

        $abuse=json_decode(abuse(strip_tags($post->body)));
        $emotion=json_decode(emotion(strip_tags($post->body)));
        $sentiment=json_decode(sentiment(strip_tags($post->body)));

        //abuse type
        $insight->abuse_type=$abuse->type;
        $insight->abuse_tags=implode(",",$abuse->tags);

        //emotions
        $insight->bored=$emotion->emotion->Bored;
        $insight->sad=$emotion->emotion->Sad;
        $insight->angry=$emotion->emotion->Angry;
        $insight->happy=$emotion->emotion->Happy;
        $insight->fear=$emotion->emotion->Fear;
        $insight->excited=$emotion->emotion->Excited;
        //sentiment
        $insight->sentiment_type=$sentiment->type;
        $insight->positive=$sentiment->sentiment->positive;
        $insight->negative=$sentiment->sentiment->negative;
        $insight->neutral=$sentiment->sentiment->neutral;
        //post id

        //blocking of post
        if($insight->sentiment_type){
          $post->status=0;
          //blocking user
          $user=User::find($post->user_id);
          $user->violations=$user->violations+1;

          if($user->violations>3){
            $user->status=0;
          }

        }

        $post->save();
        $insight->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        if($post->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }



}

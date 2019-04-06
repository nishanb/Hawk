<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Insight;
//parallel dots plugin
require(base_path().'/app/functions/API.php');
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'comment' => 'required',
            'post_id' => 'required',
        ]);

        $comment=new Comment();
        $comment->post_id=$request->input('post_id');
        $comment->description=strip_tags($request->input('comment'));

        //insight
        //create insight
        $insight=new Insight;
        //get data from sentimental model
        $abuse=json_decode(abuse(strip_tags($comment->description)));
        $emotion=json_decode(emotion(strip_tags($comment->description)));
        $sentiment=json_decode(sentiment(strip_tags($comment->description)));
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

        $comment->status=$insight->sentiment_type;
        //blocking of post
        if($insight->sentiment_type==0){

          //blocking user
          $user=User::find(auth()->user()->id);
          $user->violations=$user->violations+1;
          //block if violation greater than 3
          if($user->violations>3){
            $user->status=0;
          }
          $user->save();
        }

        $insight->save();

        $comment->insight_id=$insight->id;
        $comment->uid=auth()->user()->id;
        $comment->save();
        return "200";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}

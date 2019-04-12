@extends('user.layouts.app')
@section('content')
  <div class="row " style="margin-top:-20px;" background="">
    <!--posts content-->
    <meta name="postid" content="{{$post->id}}">

    <div class="col-xl-12 mb-12 mb-xl-0">
      <div class="card  shadow">
        <div class="card-header border-0 shadow-lg ">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">{{$post->title}}</h3>
            </div>
             <div class="col text-right">
              <small class="text-success">Written by {{$post->user->name}}</small>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="row align-items-center">
            <div class="col-xl-12 mb-12 mb-xl-0">
              <h3 class="mb-0">{!!$post->body!!}</h3>
            </div>
            <div class="col-xl-12 mb-12 mb-xl-0">
              <div class="col text-right">
                    @if(!Auth::guest())
                        @if(Auth::user()['id'] == $post['user_id'])
                            <div class="btn-group">
                              <a href="/posts/{{$post['id']}}/edit" class="btn btn-sm btn-primary mr-2">Edit</a>
                            </div>
                            <div class="btn-group">
                              {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                              {!!Form::close()!!}
                            </div>
                        @endif
                    @endif
                  </span>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--comments-->
    <div class="col-xl-12 mb-12 mb-xl-0 mt-2">
      <div class="card">
        <div class="card-header border-0 shadow-lg ">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0 text-succes">Comments</h3>
            </div>
            {{-- <div class="col text-right">
              <a href="{{url("admin/posts")}}" class="btn btn-sm btn-primary">All Posts</a>
            </div> --}}
          </div>
        </div>
        <div class="card-body ">
          <div class="row align-items-center">
            <div class="col col-xl-12 mb-12 mb-xl-0">
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush" id="commentsTable">
                  <tbody>

                    @foreach ($comments as $comment)
                      @if ($comment->status!=0)
                        <tr>
                          <td>
                            {{$comment->description}}
                          </td>
                        </tr>
                      @endif
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="row align-items-center ">
            <div class="col col-xl-12 mb-12 mb-xl-0 mt-2">
              @if (auth()->check())
                {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{Form::text('comment', '', ['class' => 'form-control', 'placeholder' => 'write your comment'])}}
                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
                    </div>
                    {{Form::submit('Submit', ['class'=>'btn btn-sm btn-primary mt-2 csb'])}}
                {!! Form::close() !!}

              @else
                <p class="text-center"><a href="{{url("/login")}}">Login</a> to comment</p>
              @endif

            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
@endsection

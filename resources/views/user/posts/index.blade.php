@extends('user.layouts.app')
@section('content')
  <div class="col-xl-12 mb-12 mb-xl-0" style="margin-top:-20px;" >
    <div class="card  shadow ">
      <div class="card-header border-0 shadow-lg ">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Latest Posts</h3>
          </div>
           <div class="col text-right">
            <small class="text-success">Updated 2 mins ago</small>
          </div>
        </div>
      </div>
        @include('notification.messages')
      <div class="card-body ">
        <div class="row align-items-center">
          <div class="row">

            @foreach ($posts as $post)
                <div class="col-lg-4">
                  <div class="card mt-2" style="width: 24rem;">
                    <div class="card-body">
                      <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" width="150px;" height="200px;">
                      <h4 class="card-title mt-3">{{$post->title}}</h4>
                      <a href="{{url("posts/$post->id")}}" class=" text-center btn btn-primary btn-lg btn-block">View post</a>
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@extends('user.layouts.app')
@section('content')
  <div class="row " style="margin-top:-100px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      <div class="card  shadow">
        <div class="card-header border-0 shadow-lg ">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">create a new post</h3>
            </div>
             <div class="col text-right">
              <small class="text-success"></small>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="row align-items-center">
            <div class="col-xl-12 mb-12 mb-xl-0">
              {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                  <div class="form-group">
                      {{Form::label('title', 'Title')}}
                      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                  </div>
                  <div class="form-group">
                      {{Form::label('body', 'Body')}}
                      {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                  </div>
                  <div class="form-group">
                      {{Form::file('cover_image')}}
                  </div>
                  {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection

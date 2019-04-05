@extends('admin.app')
@section('content')

  <div class="row">
    <div class="col-xl-6 mb-6 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Latest Posts</h3>
            </div>
            <div class="col text-right">
              <a href="{{url("admin/posts")}}" class="btn btn-sm btn-primary">See all</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">title</th>
                <th scope="col">post</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>{{$post->title}}</td>
                <td><a href="{{url("admin/post/$post->id")}}" class="btn btn-sm btn-primary">view</a></td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-xl-6 mb-6 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Comments</h3>
            </div>
            <div class="col text-right">
              <a href="{{url("admin/comments")}}" class="btn btn-sm btn-primary">See all</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>

                <th scope="col">comment</th>
                <th scope="col">post</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($comments as $comment)
                <tr>
                  <td>{{$comment->description}}</td>
                  <td><a href="{{url("admin/post/$comment->post->id")}}" class="btn btn-sm btn-primary">view</a></td>
                </tr>
              @endforeach


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('admin.app')
@section('content')
  <div class="row " style="margin-top:0px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      @if (count($posts)==0)
        <div class="col text-left">
          <p class="h1 text-white">Nothing in Here</p>
          <a href="{{url("admin/users")}}" class="btn btn-sm btn-secondary h3">Go Back</a>
        </div>
      @else
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">All Posts</h3>
            </div>
            <div class="col text-right">
              {{-- <a href="{{url("admin/users")}}" class="btn btn-sm btn-primary">All users</a> --}}
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Post id</th>
                <th scope="col">Title</th>
                <th scope="col">writer</th>
                <th scope="col">Status</th>
                <th scope="col">view</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=0?>
               @foreach ($posts as $post)
                <tr>
                  <th scope="row">
                    {{++$i}}
                  </th>
                  <td>
                    {{$post['title']}}
                  </td>
                  <td>
                    {{$post->user['name']}}
                  </td>

                  @if ($post->status)
                    <td>
                      <span class="text-success">Active</span>
                    </td>
                  @else
                    <td>
                      <span class="text-danger">Blocked</span>
                    </td>
                  @endif
                  <td>
                    <a href="{{url("admin/posts/$post[id]")}}" class="btn btn-sm btn-primary">view</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection

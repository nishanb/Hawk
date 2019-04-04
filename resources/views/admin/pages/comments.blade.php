@extends('admin.app')
@section('content')
  <div class="row " style="margin-top:0px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      {{-- @if (count($posts)==0)
        <div class="col text-left">
          <p class="h1 text-white">Nothing in Here</p>
          <a href="{{url("admin/users")}}" class="btn btn-sm btn-secondary h3">Go Back</a>
        </div>
      @else --}}
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">All Comments</h3>
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
                <th scope="col">Comment id</th>
                <th scope="col">Description</th>
                <th scop="col">Insight</th>
                <th scope="col">Post</th>
                <th scope="col">Action</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1?>
               @foreach ($comments as $comment)
                <tr>
                  <th scope="row">
                    {{$i++}}
                  </th>
                  <td>
                    {{$comment['description']}}
                  </td>
                  <td>
                    <a href="{{url("admin/post/$comment[post_id]")}}" class="btn btn-sm btn-primary">view</a>
                  </td>
                  <td>
                    <a href="{{url("admin/post/$comment[post_id]")}}" class="btn btn-sm btn-primary">view</a>
                  </td>
                  <td>
                    <a href="#!" class="btn btn-sm btn-danger">Block</a>
                  </td>
                  <td>
                    <span class="text-success">Active</span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{-- @endif --}}
    </div>
  </div>
@endsection

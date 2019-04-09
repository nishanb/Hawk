@extends('admin.app')
@section('content')
  <div class="row " style="margin-top:0px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
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
                <th scope="col">Status</th>
                <th scope="col">Insights</th>
                <th scope="col">Action</th>
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
                  @if ($comment->status)
                    <td>
                      <span class="text-success">Active</span>
                    </td>
                  @else
                    <td>
                      <span class="text-danger">Blocked</span>
                    </td>
                  @endif
                  <td>
                    <a href="{{url("admin/comments/$comment[id]")}}" class="btn btn-sm btn-primary">view</a>
                  </td>
                  <td>
                    <a class="btn btn-sm ">
                      {!!Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST'])!!}
                          {{Form::hidden('_method', 'DELETE')}}
                          {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                      {!!Form::close()!!}
                    </a>
                  </td>
                </tr>

              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

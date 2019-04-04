@extends('admin.app_ns')
@section('content')
  <div class="row " style="margin-top:-150px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0 shadow-lg p-3 mb-0 bg-white rounded">
          <div class="row align-items-center">
            <div class="col">
              <h2 class="mb-0">{{$post['title']}}</h3>
            </div>
            {{-- <div class="col text-right">
              <a href="{{url("admin/users")}}" class="btn btn-sm btn-primary">All users</a>
            </div> --}}
          </div>
        </div>
        <div class="card-body" style="box-shadow:2px;">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Insights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-calendar-grid-58 mr-2"></i>Comments</a>
                    </li>
                </ul>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active " id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab" style="border-radius: 10px !important;">
                            {{-- <p class="description"></p> --}}
                            {!!$post->body!!}
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                            <p class="description text-center">working on it</p>
                        </div>
                        <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                          @if(count($comments)==0)
                            <h2 class="description text-center">Nothing in here</p>
                          @else
                          <table class="table align-items-center table-flush" id="">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Comment id</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scop="col">Insights</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i=0?>
                              @foreach ($comments as $comment)
                                <tr>
                                  <td>{{++$i}}</td>
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
                                    <a href="#" class="btn btn-sm btn-primary">view</a>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>

    </div>
  </div>
@endsection

@extends('admin.app_ns')
@section('content')
  <!--posts content-->
  <meta name="userid" content="{{$user->id}}">
  <meta name="userstatus" content="{{$user->status}}">
  <meta name="usersentiment" content="{{json_encode($data)}}">

  <div class="row " style="margin-top:-150px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      {{--user insights  --}}
      <div class="card shadow">
          <div class="card-header border-0 shadow-lg">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">{{$userName}}'s insight</h3>
              </div>
              <div class="col text-right">
                <a href="{{url("admin/users")}}" class="btn btn-sm btn-primary">All users</a>
              </div>
            </div>
          </div>
          <div class="card-body ">
            {{--user tabs  --}}
            <div class="row">
              {{--posts  --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Posts</h5>
                        <span class="h2 font-weight-bold mb-0">{{count($user->posts)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-chart-bar"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              {{--comments  --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl- shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Comments</h5>
                        <span class="h2 font-weight-bold mb-0">{{count($user->comments)}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                          <i class="fas fa-chart-pie"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              {{-- violations --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Violations</h5>
                        <span class="h2 font-weight-bold mb-0">{{$user->violations}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                      <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Since last month</span>
                    </p> --}}
                  </div>
                </div>
              </div>
              {{-- status --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Status</h5>
                        <span class="h2 font-weight-bold mb-0">
                          @if ($user->status==1)
                            <span class="text-success">Active</span>
                          @else
                            <span class="text-danger">Blocked</span>
                          @endif
                        </span>
                      </div>
                      <div class="col-auto">
                        <label class="custom-toggle">
                          <input type="checkbox" id="userStatus" onchange="toggleContentState('users',{{$user->id}},{{$user->status}})" @if ($user->status==1) checked @endif>
                          <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                      </div>

                    </div>
                    {{-- <p class="mt-3 mb-0 text-muted text-sm">
                      <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                      <span class="text-nowrap">Since last month</span>
                    </p> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              {{--user details  --}}
              <div class="col-xl-6 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                      <div class="col">
                        <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                        <h2 class=" mb-0">{{$user->name}}</h2>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pb-5">
                    <div class="row">
                      <div class="col">
                        <div class="card-body">
                            <form>
                              <div class="pl-lg-4">
                                <div class="row pb-3">
                                  <div class="col-lg-12">
                                    <div class="form-group focused">
                                      <label class="form-control-label" for="input-username">Username</label>
                                      <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{$user->name}}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-lg-12">
                                    <div class="form-group">
                                      <label class="form-control-label" for="input-email">Email address</label>
                                      <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="{{$user->email}}" disabled>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{--comments  --}}
              <div class="col-xl-6 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0  shadow">
                  <div class="card-header bg-transparent ">
                    <div class="row align-items-center">
                      <div class="col">
                        <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                        <h2 class=" mb-0">Sentiment</h2>
                      </div>
                    </div>
                  </div>

                  <div class="card-body" style="">
                      @if(count($user->posts)!=0 || count($user->comments)!=0)
                      <canvas id="userInsightRadar" width="400" height="280"></canvas>
                      @else
                        <div>
                          <img width="350" height="240" class="pl-5" src="https://cdn.dribbble.com/users/14356/screenshots/2454767/caveman.gif" alt="not enough data">
                          <p class="text-center">Not enough data</p>
                        </div>
                      @endif
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      {{-- user posts --}}
      @if (count($user->posts)!=0)
        <div class="card shadow mt-3">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">{{$userName}}'s Posts</h3>
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
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                  <th scope="col">view</th>
                </tr>
              </thead>
              <tbody>
                 @foreach ($posts as $post)
                  <tr>
                    <th scope="row">
                      {{$post['id']}}
                    </th>
                    <td>
                      {{$post['title']}}
                    </td>
                    @if ($post->status)
                      <td>
                        <span class="text-success">Active</span>
                      </td>
                      <td>
                        <a href="{{url("admin/block/post/$post->id/$post->status")}}" class="btn btn-sm btn-danger">Block</a>
                      </td>
                    @else
                      <td>
                        <span class="text-danger">Blocked</span>
                      </td>
                      <td>
                        <a href="{{url("admin/block/post/$post->id/$post->status")}}" class="btn btn-sm btn-success">Unblock</a>
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
      {{-- user comments --}}
      @if (count($user->comments)!=0)
        <div class="card shadow mt-3">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">{{$userName}}'s Comments</h3>
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
                  <th scope="col">Comment</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                  <th scope="col">insights</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=0?>
                 @foreach ($comments as $comment)
                  <tr>
                    <th scope="row">
                      {{++$i}}
                    </th>
                    <td >
                      {{$comment->description}}
                    </td>
                    @if ($comment->status)
                      <td>
                        <span class="text-success">Active</span>
                      </td>
                      <td>
                        <a href="{{url("admin/block/comment/$comment->id/$comment->status")}}" class="btn btn-sm btn-danger">Block</a>
                      </td>
                    @else
                      <td>
                        <span class="text-danger">Blocked</span>
                      </td>
                      <td>
                        <a href="{{url("admin/block/comment/$comment->id/$comment->status")}}" class="btn btn-sm btn-success">Unblock</a>
                      </td>
                    @endif
                    <td>
                      <a href="{{url("admin/post/$comment[id]")}}" class="btn btn-sm btn-primary">view</a>
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

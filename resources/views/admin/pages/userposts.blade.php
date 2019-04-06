@extends('admin.app_ns')
@section('content')
  <!--posts content-->
  <meta name="userid" content="{{$user->id}}">
  <meta name="userstatus" content="{{$user->status}}">

  <div class="row " style="margin-top:-150px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      @if (count($posts)==0)
        <div class="col text-left">
          <p class="h1 text-white">Nothing in Here</p>
          <a href="{{url("admin/users")}}" class="btn btn-sm btn-secondary h3">Go Back</a>
        </div>
      @else
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

            <div class="row">
              {{--posts  --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
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
                <div class="card card-stats mb-4 mb-xl-0">
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
                <div class="card card-stats mb-4 mb-xl-0">
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
                <div class="card card-stats mb-4 mb-xl-0">
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
                          <input type="checkbox" id="userStatus" onchange="toggleUserState()" @if ($user->status==1) checked @endif>
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
              {{--posts  --}}
              <div class="col-xl-6 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
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
              <div class="col-xl-6 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
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

            </div>

          </div>
        </div>
      {{-- user posts --}}
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
                    <a href="{{url("admin/post/$post[id]")}}" class="btn btn-sm btn-primary">view</a>
                  </td>

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{-- user comments --}}
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
                <th scope="col">view</th>
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
                    <a href="{{url("admin/post/$post[id]")}}" class="btn btn-sm btn-primary">view</a>
                  </td>

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      @endif
    </div>
    {{-- <div class="col-xl-4">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Social traffic</h3>
            </div>
            <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">See all</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Referral</th>
                <th scope="col">Visitors</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">
                  Facebook
                </th>
                <td>
                  1,480
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">60%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Facebook
                </th>
                <td>
                  5,480
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">70%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Google
                </th>
                <td>
                  4,807
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">80%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  Instagram
                </th>
                <td>
                  3,678
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">75%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">
                  twitter
                </th>
                <td>
                  2,645
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <span class="mr-2">30%</span>
                    <div>
                      <div class="progress">
                        <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div> --}}
  </div>
@endsection

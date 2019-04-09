<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Blogger Admin</title>
  <!-- Favicon -->
  <link href="{{asset('admin_assets/img/brand/favicon.png')}}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{asset('admin_assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
  <link href="{{asset('admin_assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{asset('admin_assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">
</head>
<body>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    @include('user.inc.navbar')
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url({{asset('admin_assets/img/theme/profile-cover.jpg')}}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-3"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{auth()->user()->name}} !</h1>
            <p class="text-white mt-0 mb-5">Welcome to Hawk! You are safe here. This is your profile page. You can see the progress you've made . <span class="text-bold"></span></p>
            <a href="{{url("/posts/create")}}" class="btn btn-info">Write Post</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mt-lg--12 mb-5 mb-xl-0" >
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{asset("admin_assets/img/theme/team-4-800x800.jpg")}}" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">{{count(auth()->user()->posts)}}</span>
                      <span class="description">POSTS</span>
                    </div>
                    <div>
                      <span class="heading">{{count(auth()->user()->comments)}}</span>
                      <span class="description">COMMENTS</span>
                    </div>
                    <div>
                      <span class="heading">{{auth()->user()->violations}}</span>
                      <span class="description">VIOLATIONS</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                  {{auth()->user()->name}},<span class="font-weight-light">@if (auth()->user()->status)
                    <span class="text-success">Active</span>
                  @else
                    <span class="text-danger">Blocked</span>
                  @endif</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>{{auth()->user()->email}}
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-danger">
                  Logout</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{auth()->user()->name}}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="{{auth()->user()->email}}">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">My Posts</h6>
                <div class="pl-lg-4">
                  @if (count($posts)==0)
                      <p class="text-center text-warning">You have no posts</p>
                  @else
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Post id</th>
                              <th scope="col">post title</th>
                              <th scope="col">Status</th>
                              <th scope="col">view</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $x=0?>
                            @foreach ($posts as $post)
                              <tr>
                                <th scope="row">
                                  {{++$x}}
                                </th>
                                <td>
                                  {{$post->title}}
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
                                  <a href="{{url("posts/$post->id")}}" class="btn btn-sm btn-success">view</a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  @endif
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      @include('user.inc.footer')
    </div>
  </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{asset('admin_assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- Optional JS -->


</body>
</html>

@extends('admin.layout.app_nm')
@section('content')
  <div class="main-content">
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main" >
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">User profile</a>
      <!-- Form -->
      <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input class="form-control" placeholder="Search" type="text">
          </div>
        </div>
      </form>
      <!-- User -->
      <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
          <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="" src="{{asset('admin_assets/img/theme/team-4-800x800.jpg')}}">
              </span>
              <div class="media-body ml-2 d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold">{{auth()->user()->name}}</span>
              </div>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="{{url('admin/profile')}}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="{{url("admin/")}}" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Header -->
  <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 700px; background-image: url({{asset("admin_assets/img/theme/profile-cover.jpg")}}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-4"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center" style="margin-top:-150px;">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Hello {{$user->name}} !</h1>
          <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>

        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid " style="margin-top:-350px!important;">
    <div class="row" >
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0" style="margin-top:-75px!important;">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{asset("admin_assets/img/theme/team-4-800x800.jpg")}}" width="150px" height="150px" class="rounded-circle">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="d-flex justify-content-between">
              <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
              <a href="#" class="btn btn-sm btn-default float-right">Message</a>
            </div>
          </div>
          <div class="card-body pt-0 pt-md-4">
            <div class="row">
              <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                  <div>
                    <span class="heading">{{count($user->posts)}}</span>
                    <span class="description">Posts</span>
                  </div>
                  <div>
                    <span class="heading"></span>
                    <span class="description"></span>
                  </div>
                  <div>
                    <span class="heading">{{count($user->comments)}}</span>
                    <span class="description">Comments</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center">
              <h3>
                {{$user->name}}<span class="font-weight-light"></span>
              </h3>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{$user->email}}
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
                <a href="{{url("admin/users/$user->id")}}" class="btn btn-sm btn-primary">insights</a>
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
                      <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{$user->name}}">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email address</label>
                      <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="{{$user->email}}">
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
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endsection

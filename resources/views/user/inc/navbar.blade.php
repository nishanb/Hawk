<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark shadow">
  <div class="container px-4">
    <a class="navbar-brand" href="/">
      <img src="{{asset("admin_assets/img/brand/blue.png")}}" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="/">
              <img src="{{asset("admin_assets/img/brand/blue.png")}}">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Navbar items -->
      <ul class="navbar-nav ml-auto">
        @if(Auth::check())
          <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="" src="{{asset("admin_assets/img/theme/team-4-800x800.jpg")}}">
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
                <a href="{{url("/dashboard")}}" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="{{url("/posts")}}" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Posts</span>
                </a>
                @if (auth()->user()->isAdmin)
                  <a href="{{url("/admin")}}" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Admin Panel</span>
                  </a>
                @endif
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        @else
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{url('/register')}}">
              <i class="ni ni-circle-08"></i>
              <span class="nav-link-inner--text">Register</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="{{url("login")}}">
              <i class="ni ni-key-25"></i>
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
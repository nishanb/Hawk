@extends('admin.app')
@section('content')
  <div class="row mt-5" style="margin-top:0px !important;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">All Users</h3>
            </div>
            {{-- <div class="col text-right">
              <a href="#!" class="btn btn-sm btn-primary">See all</a>
            </div> --}}
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">User id</th>
                <th scope="col">Use Name</th>
                <th scope="col">Email</th>
                <th scope="col">Total Posts</th>
                <th scope="col">profile</th>
                <th>violations</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <th scope="row">
                    {{$user['id']}}
                  </th>
                  <td>
                    {{$user['name']}}
                  </td>
                  <td>
                    {{$user['email']}}
                  </td>
                  <td>
                    {{-- <i class="fas fa-arrow-up text-success mr-3"></i> 46,53% --}}
                    <span class="text-center">{{$user->posts->count()}}<span>
                  </td>
                  <td>
                    <a href="{{url("admin/users/$user[id]")}}" class="btn btn-sm btn-primary">view</a>
                  </td>
                  <td>
                    {{$user->violations}}
                  </td>
                  @if ($user->status)
                    <td>
                      <span class="text-success">Active</span>
                    </td>
                    <td>
                      <a href="{{url("admin/block/user/$user->id/$user->status")}}" class="btn btn-sm btn-danger">Block</a>
                    </td>
                  @else
                    <td>
                      <span class="text-danger">Blocked</span>
                    </td>
                    <td>
                      <a href="{{url("admin/block/user/$user->id/$user->status")}}" class="btn btn-sm btn-success">Unblock</a>
                    </td>
                  @endif

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
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

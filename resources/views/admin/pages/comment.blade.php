@extends('admin.app_ns')
@section('content')
  <meta name="postSentiments" content="{{json_encode($sentiments)}}">
  <meta name="postEmotions" content="{{json_encode($emotions)}}">

  <div class="row " style="margin-top:-150px;">
    <div class="col-xl-12 mb-12 mb-xl-0">
      {{--comment insights  --}}
      <div class="card shadow">
          {{--comment header  --}}
          <div class="card-header border-0 shadow-lg">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Comment Insights</h3>
              </div>
              <div class="col text-right">
                <a href="{{url("admin/comments")}}" class="btn btn-sm btn-primary">All comments</a>
              </div>
            </div>
          </div>
          <div class="card-body ">
            {{--comment tabs  --}}
            <div class="row">
              {{--author  --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Author</h5>
                        <span class="h4 font-weight-bold mb-0"><a href="{{url("admin/users/$comment->uid")}}">{{$comment->user->name}}</a></span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              {{--sentiment type  --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl- shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Type</h5>
                        @if($comment->insights->sentiment_type==0)
                              <span class="h4 font-weight-bold mb-0 text-danger">Negative</span>
                        @elseif($comment->insights->sentiment_type==1)
                              <span class="h4 font-weight-bold mb-0 text-success">Positive</span>
                        @else
                              <span class="h4 font-weight-bold mb-0 text-success">Neutral</span>
                        @endif
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
              {{-- emotions --}}
              <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Emotion</h5>
                        <span class="h4 font-weight-bold mb-0 text-blue text-capitalize">{{$emotion[0]}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                    </div>

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
                        <span class="h4 font-weight-bold mb-0">
                          @if ($comment->status==1)
                            <span class="text-success">Active</span>
                          @else
                            <span class="text-danger">Blocked</span>
                          @endif
                        </span>
                      </div>
                      <div class="col-auto">
                        <label class="custom-toggle">
                          <input type="checkbox" id="userStatus" onchange="toggleContentState('comment',{{$comment->id}},{{$comment->status}})" @if ($comment->status==1) checked @endif>
                          <span class="custom-toggle-slider rounded-circle"></span>
                        </label>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              {{-- abuse --}}
              <div class="col-xl-6 col-lg-12">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                          @if ($comment->insights->abuse_type)
                            <h5 class="card-title text-uppercase text-muted mb-0">
                            Non Abusive Content
                            </h5>
                            <span class="h4 font-weight-bold mb-0 text-success">Not Related to any abusive topic</span>
                          @else
                            <h5 class="card-title text-uppercase text-muted mb-0">
                            Abusive Content
                            </h5>
                            <span class="h4 font-weight-bold mb-0 text-danger">Realated to {{$comment->insights->abuse_tags}}</span>
                          @endif
                        </h5>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                          <i class="fas fa-percent"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{--comment  --}}
              <div class="col-xl-6 col-lg-12" >
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Comment</h5>
                        <span class="h5 text-blue font-weight-bold mb-0">{{$comment->description}}</span>
                      </div>
                      <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                          <i class="fas fa-car"></i>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
            {{--chart insights  --}}
            <div class="row mt-3">
              {{--user details  --}}
              <div class="col-xl-6 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0 shadow">
                  <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                      <div class="col">
                        <h6 class="text-uppercase text-light ls-1 mb-1">POST Overview</h6>
                        <h2 class=" mb-0">Sentiments</h2>
                      </div>
                    </div>
                  </div>

                  <div class="card-body" style="">
                      <canvas id="postInsightBar" width="400" height="280"></canvas>
                  </div>

                </div>
              </div>
              {{--comments  --}}
              <div class="col-xl-6 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0  shadow">
                  <div class="card-header bg-transparent ">
                    <div class="row align-items-center">
                      <div class="col">
                        <h6 class="text-uppercase text-light ls-1 mb-1">POST Overview</h6>
                        <h2 class=" mb-0">Emotions</h2>
                      </div>
                    </div>
                  </div>

                  <div class="card-body" style="">
                      <canvas id="postInsightRadar" width="400" height="280"></canvas>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
    </div>
  </div>
@endsection

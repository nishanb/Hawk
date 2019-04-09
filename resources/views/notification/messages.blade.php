@if(count($errors) > 0)
  <div class="row">
    @foreach($errors->all() as $error)
      <div class="col lg-10 ml-1 mr-1">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <span class="alert-inner--text">{{$error}}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endforeach
  </div>
@endif

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" >
      <span class="alert-inner--text"><strong>{{session('success')}}</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <span class="alert-inner--text">{{session('error')}}</span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif

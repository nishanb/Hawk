@extends('layouts.app')

@section('content')
  @if (!Auth::guest())
    <script>window.location="/dashboard"</script>
  @endif
    <div class="jumbotron text-center">
        <h1>Welcome To Blog</h1>
        <p>something here</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a> <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    </div>
@endsection

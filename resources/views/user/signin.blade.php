@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <h1>Sign In</h1>
    <div class="alert alert-danger {{ !Session::has('error') ? 'd-none' : '' }}">
      {{ Session::get('error')}}
    </div>
    <form action="{{ route('user.signin') }}" method="post">
      <div class="form-group">
        <label for="">Email</label>
        <input class="form-control" type="email" name="email" id="email" required value="" placeholder="Enter your email...">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="passwod" id="password" required value="" placeholder="Enter your password...">
      </div>
      <input type="submit" class="btn btn-primary" name="submit" value="Sign In">
      {{ csrf_field() }}
    </form>
    <h5>Dont have an account? <a href=" {{ route('user.signup') }}">Sign Up!</a></h5>
  </div>
</div>
@endsection

@extends('front.master')
@section('page_title', 'Authentication')

@section('content')

  <div class="container">
    <div class="row">
      @if(count($errors) > 0)
        <div class="alert alert-danger" role="alert">
          @foreach($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
      @endif

      <div class="col-md-6">
        <!--Login Form -->
        {!! Form::open(["url"=>"/auth/login", "class"=>"form-signin"]) !!}
          <h3 class="form-signin-heading">Please sign in</h3>
          <div class="form-group">
            {!! Form::label("emailAddress", "Email address") !!}
            {!! Form::email("email", App\User::inRandomOrder()->first()->email, ["placeholder"=>"Email address", "class"=>"form-control", "id"=>"emailAddress", "required", "autofocus"]) !!}
          </div>
          <div class="form-group">
            {!! Form::label("inputPassword", "password") !!}
            <input type="password" name="password" placeholder="Password" class="form-control" id="inputPassword" value="123456" required>
            <span class="help-block">Any password is: 123456</span>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          {!! Form::submit("Login", ["class"=>"btn btn-primary"]) !!}
        {!! Form::close() !!}

        <!--End Login Form-->
      </div>

      <div class="col-md-6">

        <!--Signup Form -->
        {!! Form::open(["url"=>"/auth/register"]) !!}
          <h3 class="form-signin-heading">Register New Account</h3>
          <div class="form-group">
            {!! Form::label("userName", "Your name") !!}
            {!! Form::text("name", "", ["placeholder"=>"User name", "class"=>"form-control", "id"=>"userName", "required", "autofocus"]) !!}
          </div>
          <div class="form-group">
            {!! Form::label("emailAddress", "Email address") !!}
            {!! Form::email("email", "", ["placeholder"=>"Email address", "class"=>"form-control", "id"=>"emailAddress", "required"]) !!}
          </div>
          <div class="form-group">
            {!! Form::label("userPassword", "Password") !!}
            {!! Form::password("password", ["placeholder"=>"Password", "class"=>"form-control", "id"=>"userPassword", "required"]) !!}
          </div>
          <div class="form-group">
            {!! Form::label("confirmationPassword", "Return password") !!}
            {!! Form::password("password_confirmation", ["placeholder"=>"Password confirmation", "class"=>"form-control", "id"=>"confirmationPassword", "required"]) !!}
          </div>
          {!! Form::submit("Sign in", ["class"=>"btn btn-success", "id"=>"signupBtn"]) !!}
        {!! Form::close() !!}
        <!--End Signup Form-->
      </div>
    </div>
  </div> <!-- /container -->

@stop
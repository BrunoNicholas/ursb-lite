@extends('layouts.auth')
@section('title') Register @endsection
@section('content')
<div class="login-box card">
    <div class="card-body">
        <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">
        	@csrf

            <h3 class="box-title m-b-20"> Create an account with {{ config('app.name') }} </h3>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Full Name" style="border-radius: 3px; padding: 10px;" value="{{ old('name') }}" required autofocus>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" style="border-radius: 3px; padding: 10px;" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" required placeholder="{{ __('Password') }}" style="border-radius: 3px; padding: 10px;">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}" style="border-radius: 3px; padding: 10px;">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="checkbox checkbox-success">
                        <input id="checkbox-signup" type="checkbox" required>
                        <label for="checkbox-signup"> I agree to all <a href="javascript:void(0)">Terms</a></label>
                    </div>
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up &amp; Login</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <div>Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a></div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.auth')
@section('title') Welcome Back - Login @endsection
@section('content')
<div class="login-box card">
    <div class="card-body">
        <form class="form-horizontal form-material" id="loginform" action="{{ route('login') }}" method="post">
        	@csrf

            <h3 class="box-title m-b-20 text-center">Welcome Back | {{ config('app.name') }}</h3>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="email" required="" placeholder="Email Address" value="{{ old('email') }}" required autofocus style="padding: 10px; border-radius: 3px;"> 
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  type="password" placeholder="Password" style="padding: 10px; border-radius: 3px;" required> 
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                <div class="col-md-12 font-14">
                    <div class="checkbox checkbox-primary pull-left p-t-0">
                        <input id="checkbox-signup" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="checkbox-signup"> {{ __('Remember Me') }} </label>
                    </div> 
                    
                    @if (Route::has('password.request'))
                    	<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><!-- <i class="fa fa-lock m-r-5"></i> -->
                            <!-- {{ route('password.request') }} -->{{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"> {{ __('Login') }} </button>
                </div>
            </div>
            <!-- 
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    <div class="social">
                        <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                        <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                    </div>
                </div>
            </div> -->
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <div>Don't have an account? <a href="{{ route('register') }}" class="text-info m-l-5"><b>Sign Up</b></a></div>
                </div>
            </div>
        </form>

        <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.email') }}">
        	@csrf
        	@foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3>Recover Password</h3>
                    <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" type="text" required placeholder="{{ __('E-Mail Address') }}"> 
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"> {{ __('Send Password Reset Link') }} </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
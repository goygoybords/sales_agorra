@extends('layouts.app')

    @section('content')
        <body class="login-body">
            <div class="container">
                <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}"> 
                    {!! csrf_field() !!}
                    <h2 class="form-signin-heading">Sign In </h2>
                    <div class="login-wrap">
                        <input type="email" class="form-control" placeholder="Email" 
                        name="email" value="{{ old('email') }}" autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input type="password" class="form-control" placeholder = "Password" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <label class="checkbox">
                            <input type="checkbox" name="remember"> Remember Me
                            <span class="pull-right">
                                 <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </span>
                        </label>
                        <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
                    </div>
                </form>
             </div>
         </body>
    @endsection

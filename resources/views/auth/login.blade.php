@extends('site.master')

@section('siteContent')

<section id="main" class="clearfix user-page">
    <div class="container">
        <div class="row text-center">
            <!-- user-login -->			
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="user-account">
                    <h2>{{ __('Login') }}</h2>
                    <!-- form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control" name="password" required>
                        </div>
                        <div class="user-option">
                            <div class="pull-left">
                                <label>
                                    <input checked="{{old('remember') ? 'true' : 'false'}}" type="checkbox" name="remember" id="logged"/> {{ __('Remember Me') }} 
                                </label>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            </div>
                        </div><!-- forgot-password -->
                        <button type="submit" href="#" class="btn">{{ __('Login') }}</button>
                    </form><!-- form -->

                    <!-- forgot-password -->

                </div>
                <a href="{{ route('register') }}" class="btn-primary">{{ __('Register') }}</a>
            </div><!-- user-login -->			
        </div><!-- row -->	
    </div><!-- container -->
</section><!-- signin-page -->


@endsection

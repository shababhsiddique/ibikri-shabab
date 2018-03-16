@extends('site.master')

@section('siteContent')

<section id="main" class="clearfix user-page">
    <div class="container">
        <div class="row text-center">
            <!-- user-login -->			
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="user-account">
                    <h2>{{ __('Reset Password') }}</h2>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- form -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>                       
                        <button type="submit" href="#" class="btn">{{ __('Send Password Reset Link') }}</button>
                    </form>
                    <!-- form -->

                    <!-- forgot-password -->
                </div>
            </div><!-- user-login -->			
        </div><!-- row -->	
    </div><!-- container -->
</section><!-- signin-page -->


@endsection


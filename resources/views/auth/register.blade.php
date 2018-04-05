@extends('site.master')

@section('siteContent')

<section id="main" class="clearfix user-page">
    <div class="container">
        <div class="row text-center">
            <!-- user-login -->			
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <div class="user-account">                    
                    <h2>{{ __('Register') }}</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        @if ($errors->has('name'))
                        <strong class="text-danger pull-left">{{ $errors->first('name') }}</strong>
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" placeholder="{{ __('Name') }}" class="form-control" name="name" value="{{ old('name') }}" autofocus>                                                        
                        </div>                        

                        @if ($errors->has('email'))
                        <strong class="text-danger pull-left">{{ $errors->first('email') }}</strong>
                        @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" placeholder="{{ __('E-Mail Address') }}" class="form-control" name="email" value="{{ old('email') }}" >
                        </div>
                        
                        @if ($errors->has('password'))
                        <strong class="text-danger pull-left">{{ $errors->first('password') }}</strong>
                        @endif
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control" name="password" >
                        </div>
                        
                        <div class="form-group">
                            <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" >
                        </div>
                        
                        <div class="form-group">
                            <label><input type="checkbox" name="signing" id="confirm"> By signing up for an account you agree to our Terms and Conditions <span class="text-danger" id="confirm-err"></span> </label>
                        </div>
                       
                        <button type="submit" onclick="return verifyTick()" href="#" class="btn">{{ __('Register') }}</button>	
                    </form>
                    <!-- checkbox -->

                </div>
            </div><!-- user-login -->			
        </div><!-- row -->	
    </div><!-- container -->
</section><!-- signup-page -->
@endsection

<div class="navbar-left">
    <div class="collapse navbar-collapse" id="navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="{{ (Request::is('en') || Request::is('bn') || Request::is('/') )  ? 'active' : '' }}"><a href="{{url('/')}}">@lang('Home')</a></li>
            <li class="{{ ( Request::is('*/all-ads*') ) ? 'active' : '' }}"><a href="{{url('/all-ads')}}">@lang('All Ads')</a></li>
        </ul>
    </div>
</div>

<!-- nav-right -->
<div class="nav-right">
    <!-- language-dropdown -->
    <div class="dropdown language-dropdown">

        <a data-toggle="dropdown" href="#"><span class="change-text">@lang('English')</span> <i class="fa fa-angle-down"></i></a>

        <ul class="dropdown-menu language-change">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </div><!-- language-dropdown -->

    <!-- sign-in -->					
    <ul class="sign-in">
        @guest
        <li><i class="fa fa-user"></i></li>
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
        <li><i class="fa fa-user"></i></li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu language-change">
                <li><a href="{{ url('/dashboard') }}"><i class="fa fa-dashboard"></i>{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> {{ __('Logout') }}</a>
                </li>
                <li>                                        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

        </li>
        @endguest                            
    </ul><!-- sign-in -->					

    <a href="{{url('post-ad')}}" class="btn">@lang('Place Your Ad')</a>
</div>
<!-- nav-right -->
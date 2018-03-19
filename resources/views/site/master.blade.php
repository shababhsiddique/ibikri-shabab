<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Theme Region">
        <meta name="description" content="">

        <title>Trade | World's Largest Classifieds Portal</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('site-assets/css/bootstrap.min.css')}}" >
        <link rel="stylesheet" href="{{asset('site-assets/css/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('site-assets/css/icofont/css/icofont.css')}}">
        <link rel="stylesheet" href="{{asset('site-assets/css/owl.carousel.css')}}">  
        <link rel="stylesheet" href="{{asset('site-assets/css/slidr.css')}}">     
        <link rel="stylesheet" href="{{asset('site-assets/css/main.css')}}">  
        <link id="preset" rel="stylesheet" href="{{asset('site-assets/css/presets/preset1.css')}}">
        <link rel="stylesheet" href="{{asset('site-assets/css/responsive.css')}}">


        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href="https://fonts.maateen.me/mukti/font.css" rel="stylesheet">

        <!-- icons -->
        <link rel="icon" href="images/ico/favicon.ico">	
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('site-assets/images/ico/apple-touch-icon-144-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('site-assets/images/ico/apple-touch-icon-114-precomposed.png')}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('site-assets/images/ico/apple-touch-icon-72-precomposed.html')}}">
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{asset('site-assets/images/ico/apple-touch-icon-57-precomposed.png')}}">
        <!-- icons -->


        <!-- JS -->
        <script src="{{asset('site-assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('site-assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('site-assets/js/bootstrap.min.js')}}"></script>

        <!-- animate css -->
        <link rel="stylesheet" href="{{asset('site-assets/css/animate.css')}}">  

        <!-- Chosen -->
        <link rel="stylesheet" href="{{asset('site-assets/plugins/chosen/chosen.min.css')}}">  
        <script src="{{asset('site-assets/plugins/chosen/chosen.jquery.min.js')}}"></script>

        <!-- notify -->
        <script src="{{asset('site-assets/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bn">
        <!-- header -->
        <header id="header" class="clearfix">
            <!-- navbar -->
            <nav class="navbar navbar-default">
                <div class="container">
                    <!-- navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('/')}}"><img class="img-responsive" src="{{asset('site-assets/logo/35p-with-text.png')}}" alt="Logo"></a>
                    </div>
                    <!-- /navbar-header -->

                    <div class="navbar-left">
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="{{url('/')}}">@lang('topmenu.home')</a></li>
                                <li><a href="details.html">@lang('topmenu.allads')</a></li>                                
                            </ul>
                        </div>
                    </div>

                    <!-- nav-right -->
                    <div class="nav-right">
                        <!-- language-dropdown -->
                        <div class="dropdown language-dropdown">
                            					
                            <a data-toggle="dropdown" href="#"><span class="change-text">@lang('topmenu.locale')</span> <i class="fa fa-angle-down"></i></a>

                            <ul class="dropdown-menu language-change">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <!--                            <ul class="dropdown-menu language-change">
                                                            <li><a href="#">English</a></li>
                                                            <li><a href="#">বাংলা</a></li>
                                                        </ul>								-->
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

                        <a href="ad-post.html" class="btn">@lang('index.ad_button')</a>
                    </div>
                    <!-- nav-right -->
                </div><!-- container -->
            </nav><!-- navbar -->
        </header><!-- header -->


        <!-- notification -->
        @yield('notification')
        <!-- notification -->

        <!--site content--> 
        @yield('siteContent')
        <!--site content--> 


        @include('site.common.footer')

        <!--
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="{{asset('site-assets/js/gmaps.min.js')}}"></script>
        -->

        <script src="{{asset('site-assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('site-assets/js/smoothscroll.min.js')}}"></script>
        <script src="{{asset('site-assets/js/scrollup.min.js')}}"></script>
        <script src="{{asset('site-assets/js/price-range.js')}}"></script>  
        <script src="{{asset('site-assets/js/jquery.countdown.js')}}"></script>  
        <script src="{{asset('site-assets/js/custom.js')}}"></script>

        <script type="text/javascript">
                                               $("document").ready(function ()
                                               {
                                               $(".chosen-select").chosen();
                                               });
        </script>
    </body>
</html>
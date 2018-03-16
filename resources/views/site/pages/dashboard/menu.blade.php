<div class="ad-profile section">	
    <div class="user-profile">
        <div class="user-images">
            <img src="https://demo.themeregion.com/trade/images/user.jpg" alt="User Images" class="img-responsive">
        </div>
        <div class="user">
            <h2>@lang('site.hello'), <a href="#">{{ Auth::user()->name }}</a></h2>
            <h5>@lang('site.youjoinedin'): {{ Auth::user()->created_at }}</h5>
        </div>

        <div class="favorites-user">            
            <div class="favorites">
                <a href="#">18<small>@lang('site.advertisements')</small></a>
            </div>
        </div>								
    </div><!-- user-profile -->

    <ul class="user-menu">        
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{url('/dashboard')}}">@lang('site.myads')</a></li>        
        <li class="{{ Request::is('account') ? 'active' : '' }}"><a href="{{url('/account')}}">@lang('site.accountsettings')</a></li>
        <li><a href="favourite-ads.html">@lang('site.favouriteads')</a></li>
        <li><a href="archived-ads.html">@lang('site.archivedads')</a></li>
        <li><a href="pending-ads.html">@lang('site.pendingapproval')</a></li>        
    </ul>

</div><!-- ad-profile -->
<div class="ad-profile section">	
    <div class="user-profile">
        <div class="user-images">
            <img src="https://demo.themeregion.com/trade/images/user.jpg" alt="User Images" class="img-responsive">
        </div>
        <div class="user">
            <h2>@lang('Hello'), <a href="#">{{ Auth::user()->name }}</a></h2>
            <h5>@lang('You joined at'): {{ Auth::user()->created_at }}</h5>
        </div>

        <div class="favorites-user">            
            <div class="favorites">
                <a href="#">18<small>@lang('Ads')</small></a>
            </div>
        </div>								
    </div><!-- user-profile -->

    <ul class="user-menu">        
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a href="{{url('/dashboard')}}">@lang('My Ads')</a></li>        
        <li class="{{ Request::is('account') ? 'active' : '' }}"><a href="{{url('/account')}}">@lang('Account Settings')</a></li>
        <li><a href="favourite-ads.html">@lang('Favourites')</a></li>
        <li><a href="archived-ads.html">@lang('Archived')</a></li>
        <li><a href="pending-ads.html">@lang('Pending Approval')</a></li>        
    </ul>

</div><!-- ad-profile -->
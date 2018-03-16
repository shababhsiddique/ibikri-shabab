<!-- recommended-cta-->
<div class="col-sm-3 text-left">
    <!-- recommended-cta -->
    <div class="recommended-cta">					
        <div class="cta" style="padding: 0px">                            
            <!-- single-cta -->						
            <div class="single-cta">                                
                <h4>{{ Auth::user()->name }}</h4>
                <p>Description</p>
                <h4>@lang('site.account.email')</h4>
                <p>{{ Auth::user()->email }}</p>
                <h4>@lang('site.account.mobile')</h4>
                <p>{{ Auth::user()->mobile }}</p>
                <h4>@lang('site.account.info')</h4>
                <p>{{ Auth::user()->info }}</p>
            </div>
            <!-- single-cta -->




            <!-- single-cta -->
            <div class="single-cta">
                <h5>@lang('site.needhelp')</h5>
                <p><span>@lang('site.givecall')</span><a href="tellto:08048100000"> 08048100000</a></p>
            </div>
            <!-- single-cta -->
        </div>
    </div><!-- cta -->
</div>
<!-- recommended-cta-->	
@extends('site.master')

@section('siteContent')

<section id="main" class="clearfix myads-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">@lang('site.home')</a></li>
                <li>@lang('site.account')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">My Ads</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <div class="ads-info">
            <div class="row">


                <!--profile page--> 

                <div class="col-sm-9">
                    {!! Form::model($userData,['url' => 'account/update','method' => 'post']) !!}
                    <div class="user-pro-section">
                        <!-- profile-details -->
                        <div class="profile-details section">
                            <h2>@lang('site.account.details')</h2>
                            <!-- form -->
                            <div class="form-group">
                                <label>@lang('site.account.name')</label>
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label>@lang('site.account.email')</label>
                                {!! Form::email('email', null, ['class' => 'form-control', 'disabled'=> 'true']) !!}
                            </div>

                            <div class="form-group">
                                <label for="name-three">@lang('site.account.mobile')</label>
                                {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                <label>@lang('site.account.yourcity')</label>
                                <a class="btn btn-select" data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/locations')}}" href="#">
                                    <span class="change-text">United Kingdom</span>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>                                                              
                            </div>	
                            @include('site.common.categorymodal')

                            <div class="form-group">
                                <label>@lang('site.account.yourtype')</label>
                                <select class="form-control">
                                    <option value="#">@lang('site.account.dealer')</option>
                                    <option value="#">@lang('site.account.individual')</option>
                                </select>
                            </div>					
                        </div><!-- profile-details -->

                        <!-- change-password -->
                        <div class="change-password section">
                            <h2>@lang('site.account.changepass')</h2>
                            <!-- form -->
                            <div class="form-group">
                                <label>@lang('site.account.oldpass')</label>
                                <input type="password" name="password" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label>@lang('site.account.newpass')</label>
                                <input type="password" name="password_new" class="form-control">	
                            </div>

                            <div class="form-group">
                                <label>@lang('site.account.confirmpass')</label>
                                <input type="password" name="password_new_confirmation" class="form-control">
                            </div>															
                        </div><!-- change-password -->

                        <!-- preferences-settings -->
                        <div class="preferences-settings section">
                            <h2>@lang('site.account.preferences')</h2>
                            <!-- checkbox -->
                            <div class="form-group">
                                <label class="container">One
                                    <input type="checkbox" checked="checked">
                                    <span class="checkmark"></span>
                                </label>

                            </div>
                            <!--<input type="checkbox" name="comment_enabled" <?php echo ($userData->comment_enabled ? 'checked' : '') ?> > @lang('site.account.commentsenabled')--> 
                            <!--<br/>-->
                            <!--<input type="checkbox" name="newsletter_enabled" <?php echo ($userData->newsletter_enabled ? 'checked' : '') ?>> @lang('site.account.newsletterenabled').-->

                        </div><!-- preferences-settings -->

                        <button type="submit" class="btn btn-success">@lang('site.account.update')</button>
                        <a href="#" class="btn btn-default">@lang('site.account.cancel')</a>
                    </div><!-- user-pro-edit -->
                    {!! Form::close() !!}
                </div>
                <!-- profile -->


                <!-- sidebar --> 
                @include('site.pages.dashboard.sidebar')				

            </div><!-- row -->
        </div>
        <!-- row -->
    </div><!-- container -->
</section><!-- myads-page -->

@endsection
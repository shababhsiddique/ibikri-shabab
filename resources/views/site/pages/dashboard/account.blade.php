@extends('site.master')

@section('siteContent')

<section id="main" class="clearfix myads-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">@lang('Home')</a></li>
                <li>@lang('Account')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang("My Account")</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <div class="ads-info">
            <div class="row">


                <!--profile page--> 

                <div class="col-sm-9">
                    {!! Form::model($userData,['url' => 'account/update', 'class'=> 'form-horizontal', 'method' => 'post']) !!}
                    <div >
                        <!-- profile-details -->
                        <div class="profile-details section">
                            <h2>@lang('Account Details')</h2>
                            <!-- form -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Full Name')</label>
                                <div class="col-sm-9">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Email Address')</label>
                                <div class="col-sm-9">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'disabled'=> 'true']) !!}    
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Mobile Number')</label>
                                <div class="col-sm-9">
                                    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('mobile'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>                                
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('About')</label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('info', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('info'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('info') }}</strong>
                                    </span>
                                    @endif
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Your Location')</label>
                                <div class="col-sm-9">
                                     <?php
                                    $columnCity = __('city_title_en');
                                    if (old('city_id')) {
                                        //Form validation redirect
                                        $city = \App\Models\City::find(old('city_id'));
                                        $city_text = $city->$columnCity;
                                        $city_id = old('city_id');
                                    } elseif (isset($userData->city)) {
                                        //fresh form with users old city
                                        $city_text = $userData->city->$columnCity;
                                        $city_id = $userData->city->city_id;
                                    } else {
                                        //fresh form user city not given yet
                                        $city_text = __('Please Select');
                                        $city_id = null;
                                    }
                                    ?>
                                    <a class="btn btn-select" data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/locations')}}" href="#">
                                        <span id='location-selector-text' class="change-text">{{$city_text}}</span> 
                                        <i class="fa fa-angle-down pull-right"></i>
                                    </a>                                                                                                               
                                    {!! Form::hidden('city_id', $city_id , ['id' => 'location-selector-value']) !!}
                                    @include('site.common.categorymodal')
                                    
                                </div>
                            </div>	                            


                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Account Type')</label>
                                <div class="col-sm-9">
                                    <?php
                                    $selectData = [];
                                    $selectData[0] = __('Individual');
                                    $selectData[1] = __('Dealer');
                                    ?>
                                    {{ Form::select('user_type', $selectData, $userData->user_type, ['class' => 'form-control']) }}

                                   
                                </div>

                            </div>					
                        </div><!-- profile-details -->

                        <!-- change-password -->
                        <div class="change-password section">
                            <h2>@lang('Change Password')</h2>
                            <!-- form -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Old Password')</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control">
                                    @if ($errors->has('password_incorrect'))
                                    <span class="text-danger">
                                        <strong>The Password is Incorrect</strong>
                                    </span>
                                    @endif
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('New Password')</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_new" class="form-control">
                                    @if ($errors->has('password_new'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password_new') }}</strong>
                                    </span>
                                    @endif
                                </div>                                
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Repeat Password')</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_new_confirmation" class="form-control">                                    
                                </div>                                
                            </div>


                        </div>
                        <!-- change-password -->

                        <!-- preferences-settings -->
                        <div class="preferences-settings section">
                            <h2>@lang('Preferences')</h2>
                            <!-- checkbox -->   
                            <div class="form-group">                                
                                <div class="col-sm-9">
                                    <label>
                                        <input type="checkbox" name="comment_enabled" <?php echo ($userData->comment_enabled ? 'checked' : '') ?>>@lang('Allow comments on my posts')
                                    </label>
                                </div>                                
                            </div>
                            <div class="form-group">                                
                                <div class="col-sm-9">
                                    <label>
                                        <input type="checkbox" name="newsletter_enabled" checked="<?php echo ($userData->newsletter_enabled ? 'checked' : '') ?>">@lang('Send me newsletter from iBikri')
                                    </label>
                                </div>                                
                            </div>



                        </div><!-- preferences-settings -->

                        <button type="submit" class="btn btn-success">@lang('Update')</button>
                        <a href="#" class="btn btn-default">@lang('Cancel')</a>
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
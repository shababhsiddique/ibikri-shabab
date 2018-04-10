@extends('site.master')

@section('siteContent')
<section id="main" class="clearfix myads-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">@lang('Home')</a></li>
                <li>@lang('Balance')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('Balance')</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <?php
        $user = Auth::user();
        ?>
        <div class="ads-info">
            <div class="row">
                <div class="col-sm-9">
                    <div class=" section">
                        <h2>@lang('Balance')<span class="pull-right balance-display">{{currency($user->user_balance,'BDT')}}</span></h2>

                        <h4 class="text-success text-center">iBikri @lang('Merchant Account Number : 019595XXXXX')</h4>
                        <img src='{{asset("site-assets/images/bkashprocess.jpg")}}' class="img-responsive"/>                        
                        <p class="recharge-how">
                            @lang('Recharge your account by sending taka to 01959XXXXXX by bkash. Send the money in the above process and submit your transaction ID in the form below.')
                        </p>

                        {!! Form::open(['url' => 'balance-request', 'class'=> 'form-horizontal', 'method' => 'post']) !!}
                        <div class="profile-details section">                            
                            <!-- form -->

                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('Recharge Amount')</label>
                                <div class="col-sm-5">                                    
                                    {!! Form::text('recharge_amount', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('recharge_amount'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('recharge_amount') }}</strong>
                                    </span>
                                    @endif
                                </div>                                
                            </div>   
                            <div class="form-group">
                                <label class="control-label col-sm-3">@lang('bKash Confirm Code')</label>
                                <div class="col-sm-9">                                    
                                    {!! Form::text('bkash_code', null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('bkash_code'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('bkash_code') }}</strong>
                                    </span>
                                    @endif
                                </div>                                
                            </div>   
                            <div class="form-group">
                                <label class="control-label col-sm-3"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-success">@lang('Recharge')</button>
                                </div>                                
                            </div>
                        </div>
                        {!! Form::close() !!}

                        <h4>@lang('Current Promoted Ads')</h4>
                        @foreach($featured as $anAd)
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <a href="{{url('ad/'.$anAd->post_id)}}"><img src="{{asset($anAd->postimages->first()->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">{{currency($anAd->item_price,'BDT')}}</h3>
                                    <h4 class="item-title"><a href="{{url('ad/'.$anAd->post_id)}}">{{$anAd->ad_title}}</a></h4>
                                    <div class="item-cat">
                                        <?php
                                        $columnCategoryTitle = __('category_title_en');
                                        $columnSubcategoryTitle = __('subcategory_title_en');
                                        ?>
                                        <span><a href="#">{{$anAd->subcategory->category->$columnCategoryTitle}}</a></span> /
                                        <span><a href="#">{{$anAd->subcategory->$columnSubcategoryTitle}}</a></span>
                                    </div>										
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><i class="fa fa-star"></i> {{__('Promotion Ends in ').number($anAd->isPromoted())." ".__('days')}}</span>                                        
                                        <span class="visitors">@lang('Visited:') {{number($anAd->views)}}</span> 
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">                                        
                                        <a class="edit-item" href="{{url('/edit-ad/'.$anAd->post_id)}}" data-toggle="tooltip" data-placement="top" title="@lang('Edit this ad')"><i class="fa fa-pencil"></i></a>
                                    </div>
                                    <!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div>
                        <!-- custom-list-item -->
                        @endforeach
                    </div>
                </div>
                <!-- my-ads -->

                <!-- sidebar --> 
                @include('site.pages.dashboard.sidebar')

            </div><!-- row -->
        </div>
        <!-- row -->
    </div><!-- container -->
</section><!-- myads-page -->

@endsection
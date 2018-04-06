@extends('site.master')

@section('siteContent')
<section id="main" class="clearfix myads-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">@lang('Home')</a></li>
                <li>@lang('Favourites')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('My Favourites')</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <div class="ads-info">
            <div class="row">
                <div class="col-sm-9">
                    <div class=" section">
                        <h2>@lang('My Favourites')</h2>

                        @foreach($favAds as $aFav)
                        <?php $anAd = $aFav->post ?>

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <a href="details.html"><img src="{{asset($anAd->postimages->first()->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">{{$anAd->item_price}} - @lang('BDT')</h3>
                                    <h4 class="item-title"><a href="#">{{$anAd->ad_title}}</a></h4>
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
                                        <span class="dated">@lang('Posted On:') <a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <span class="visitors">@lang('Visited:') 12</span> 
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="{{$anAd->user->city->$city_title}}"><i class="fa fa-map-marker"></i> </a>
                                        <a class="" href="#" data-toggle="tooltip" data-placement="top" title="{{$usertype[$anAd->user->user_type]}}"><i class="fa fa-{{($aFav->post->user_type == 0)?'user':'suitcase'}}"></i> </a>											
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
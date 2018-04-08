@extends('site.master')

@section('siteContent')
<!-- services-ad -->
<section id="main" class="clearfix home-two">
    <!-- view-ad -->
    <div id="home-section" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h1>@lang('Welcome')</h1>
                    <h2>iBikri.com</h2>
                    <p>@lang('Best market place to find used and unused Vehicles, Phones, Computers, Properties and Many more for Free!')</p>
                    <br/><br/><br/>
                    <div class="btn-group">
                        <a href="{{url('post-ad')}}" class="btn btn-primary">@lang('Place Your Ad')</a>
                    </div>
                </div>
                <div class="col-sm-5 pull-right">                            
                    @include('site.bangladeshmap')
                </div>
            </div><!-- row -->
        </div><!-- contaioner -->
    </div><!-- view-ad -->

    <div class="container">
        <div class="row">
            <!-- banner -->
            <div class="col-sm-12">
                <div class="banner">			
                    <!--search bar-->
                    @include('site.common.searchbar')
                    <!--search bar-->
                </div>
            </div><!-- banner -->
        </div><!-- row -->	


        <div class="section services">
            <!-- single-service -->
            <?php
            $categories = Cache::rememberForever('categories', function() {
                        return DB::table('categories')
                                        ->orderBy('category_weight', 'asc')
                                        ->get();
                    });
            $rowItem = 0;
            ?>
            @foreach($categories as $aCat)
            @if($rowItem ==0)
            <div class="row">
                @endif
                <div class="single-service">
                    <div class="services-icon"><img src="{{asset($aCat->category_image)}}" alt="images" class="img-responsive"></div>
                    <h5>{{$aCat->$category_title}}</h5>
                    <ul>
                        <?php
                        $rowItem++;
                        $subCategories = Cache::rememberForever("cat-$aCat->category_id-subcats", function() use ($aCat) {
                                    return DB::table('subcategories')
                                                    ->where('parent_category_id', $aCat->category_id)
                                                    ->orderBy('subcategory_weight', 'asc')
                                                    ->get();
                                });
                        ?>
                        @foreach($subCategories as $aSubCat)
                        <li><a href='{{url("all-ads")."?category_id=$aCat->category_id&subcategory_id=$aSubCat->subcategory_id"}}'>{{$aSubCat->$subcategory_title}}</a></li>
                        @endforeach
                    </ul>
                </div>
                @if($rowItem == 5)
                <?php $rowItem = 0 ?>
            </div>
            @endif
            @endforeach

            <!-- single-service -->


        </div><!-- services -->	



        <!-- trending-ads -->
        <div class="section trending-ads">
            <div class="section-title tab-manu">
                <h4>@lang('Trending')</h4>
                <!-- Nav tabs -->   
                <ul class="nav nav-tabs">
                    <li  class="active">
                        <a data-toggle="tab" href="#recent">Most Recent</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#popular">Most Viewed</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                 <div id="recent" class="tab-pane fade in active">

                    @foreach($latestPosts as $anAd)
                    <div class="custom-list-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-sm-3">
                            <div class="item-image">
                                <a href='{{url("ad/$anAd->post_id/$anAd->ad_title")}}'><img src="{{asset($anAd->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Recent"><i class="fa fa-clock-o"></i></a>
                            </div><!-- item-image -->
                        </div>

                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">{{currency($anAd->item_price,'BDT')}}</h3>
                                <h4 class="item-title"><a href='{{url("ad/$anAd->post_id/$anAd->ad_title")}}'>{{$anAd->ad_title}}</a></h4>
                                <div class="item-cat">
                                    <span><a href="{{url('all-ads').'?category_id='.$anAd->category_id}}">{{$anAd->$category_title}}</a></span> /
                                    <span><a href="{{url('all-ads').'?subcategory_id='.$anAd->subcategory_id}}">{{$anAd->$subcategory_title}}</a></span>
                                </div>										
                            </div><!-- ad-info -->

                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">{{ formatDateLocalized($anAd->created_at) }} </a></span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> {{__($anAd->item_condition)}}</a>
                                </div>										
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="{{url('all-ads').'?city_id='.$anAd->city_id}}" data-toggle="tooltip" data-placement="top" title="{{$anAd->$city_title}}"><i class="fa fa-map-marker"></i> </a>
                                    <a class="" href="{{url('ads-by').'/'.$anAd->user_id.'/'.$anAd->name}}" data-toggle="tooltip" data-placement="top" title="{{$usertype[$anAd->user_type]}}"><i class="fa fa-{{($anAd->user_type == 0)?'user':'suitcase'}}"></i> </a>
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- custom-list-item --> 
                    @endforeach
                </div>
                
                <div id="popular" class="tab-pane fade in">

                    @foreach($topViewedPosts as $anAd)
                    <div class="custom-list-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-sm-3">
                            <div class="item-image">
                                <a href='{{url("ad/$anAd->post_id/$anAd->ad_title")}}'><img src="{{asset($anAd->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Popular"><i class="fa fa-star"></i></a>
                            </div><!-- item-image -->
                        </div>

                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">{{currency($anAd->item_price,'BDT')}}</h3>
                                <h4 class="item-title"><a href='{{url("ad/$anAd->post_id/$anAd->ad_title")}}'>{{$anAd->ad_title}}</a></h4>
                                <div class="item-cat">
                                    <span><a href="{{url('all-ads').'?category_id='.$anAd->category_id}}">{{$anAd->$category_title}}</a></span> /
                                    <span><a href="{{url('all-ads').'?subcategory_id='.$anAd->subcategory_id}}">{{$anAd->$subcategory_title}}</a></span>
                                </div>										
                            </div><!-- ad-info -->

                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">{{ formatDateLocalized($anAd->created_at) }} </a></span>
                                    <span class="visitors">@lang('Visited:') {{number($anAd->views)}} &nbsp;&nbsp;</span> 
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> {{__($anAd->item_condition)}}</a>
                                </div>										
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="{{url('all-ads').'?city_id='.$anAd->city_id}}" data-toggle="tooltip" data-placement="top" title="{{$anAd->$city_title}}"><i class="fa fa-map-marker"></i> </a>
                                    <a class="" href="{{url('ads-by').'/'.$anAd->user_id.'/'.$anAd->name}}" data-toggle="tooltip" data-placement="top" title="{{$usertype[$anAd->user_type]}}"><i class="fa fa-{{($anAd->user_type == 0)?'user':'suitcase'}}"></i> </a>
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- custom-list-item --> 
                    @endforeach
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
            </div>

        </div><!-- trending-ads -->			

    </div><!-- container -->
</section>

@endsection
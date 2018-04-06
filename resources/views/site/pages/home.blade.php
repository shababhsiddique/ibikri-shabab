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
                <?php $rowItem = 0?>
            </div>
            @endif
            @endforeach

            <!-- single-service -->


        </div><!-- services -->	



        <!-- trending-ads -->
        <div class="section trending-ads">
            <div class="section-title tab-manu">
                <h4>Trending Ads</h4>
                <!-- Nav tabs -->   
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#home">Most Popular</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu1">Most Recent</a>
                    </li>
                </ul>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="custom-list-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-sm-3">
                            <div class="item-image">
                                <a href="details.html"><img src="{{asset('site-assets/images/listing/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                            </div><!-- item-image -->
                        </div>

                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">$50.00</h3>
                                <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                <div class="item-cat">
                                    <span><a href="#">Electronics & Gedgets</a></span> /
                                    <span><a href="#">Tv & Video</a></span>
                                </div>	
                            </div><!-- ad-info -->

                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                </div>									
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                    <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->    

                    <div class="custom-list-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-sm-3">
                            <div class="item-image">
                                <a href="details.html"><img src="{{asset('site-assets/images/listing/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                            </div><!-- item-image -->
                        </div>

                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">$50.00</h3>
                                <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                <div class="item-cat">
                                    <span><a href="#">Electronics & Gedgets</a></span> /
                                    <span><a href="#">Tv & Video</a></span>
                                </div>	
                            </div><!-- ad-info -->

                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                </div>									
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                    <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->    

                    <div class="custom-list-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-sm-3">
                            <div class="item-image">
                                <a href="details.html"><img src="{{asset('site-assets/images/listing/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                            </div><!-- item-image -->
                        </div>

                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">$50.00</h3>
                                <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                <div class="item-cat">
                                    <span><a href="#">Electronics & Gedgets</a></span> /
                                    <span><a href="#">Tv & Video</a></span>
                                </div>	
                            </div><!-- ad-info -->

                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                </div>									
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                    <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->    

                    <div class="custom-list-item row">
                        <!-- item-image -->
                        <div class="item-image-box col-sm-3">
                            <div class="item-image">
                                <a href="details.html"><img src="{{asset('site-assets/images/listing/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
                            </div><!-- item-image -->
                        </div>

                        <!-- rending-text -->
                        <div class="item-info col-sm-9">
                            <!-- ad-info -->
                            <div class="ad-info">
                                <h3 class="item-price">$50.00</h3>
                                <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                <div class="item-cat">
                                    <span><a href="#">Electronics & Gedgets</a></span> /
                                    <span><a href="#">Tv & Video</a></span>
                                </div>	
                            </div><!-- ad-info -->

                            <!-- ad-meta -->
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                    <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                </div>									
                                <!-- item-info-right -->
                                <div class="user-option pull-right">
                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                    <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Dealer"><i class="fa fa-suitcase"></i> </a>											
                                </div><!-- item-info-right -->
                            </div><!-- ad-meta -->
                        </div><!-- item-info -->
                    </div><!-- ad-item -->    

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
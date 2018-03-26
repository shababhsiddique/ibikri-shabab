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
                    <!-- banner-form -->
                    <div class="banner-form banner-form-full">
                        <form action="#">
                            <!--category-change font-family: 'Mukti','Ubuntu', sans-serif;-->
                            <div class="dropdown category-dropdown">						
                                <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#">
                                    <span class="change-text" id="category-selector-text"><i class="fa fa-tags"></i> Select Category</span> <i class="fa fa-angle-down"></i>
                                    {!! Form::hidden('subcategory_id', null, ['id' => 'category-selector-value']) !!}
                                </a>
                            </div><!-- category-change -->

                            <!-- language-dropdown -->
                            <div class="dropdown category-dropdown language-dropdown ">						
                                <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/locations')}}" href="#">
                                    <span class="change-text" id="location-selector-text"><i class="fa fa-map-marker"></i> United Kingdom</span> <i class="fa fa-angle-down"></i>
                                    {!! Form::hidden('city_id', null, ['id' => 'location-selector-value']) !!}
                                </a>
                            </div><!-- language-dropdown -->

                            <input type="text" class="form-control" placeholder="Type Your key word">
                                <button type="submit" class="form-control" value="Search">Search</button>
                        </form>
                    </div><!-- banner-form -->	
                </div>
            </div><!-- banner -->
        </div><!-- row -->	


        <div class="section services">
            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/1.png')}}" alt="images" class="img-responsive"></div>
                <h5>Cars & Vehicles</h5>
                <ul>
                    <li><a href="#">Bikes & Scooters</a></li>
                    <li><a href="#">Commercial Vehicles </a></li>
                    <li><a href="#">Bicycles Spare Parts</a></li>
                    <li><a href="#">Accessories </a></li>
                    <li><a href="#">Other Vehicles</a></li>
                </ul>
            </div><!-- single-service -->	

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/2.png')}}" alt="images" class="img-responsive"></div>
                <h5>Electronics & Gedgets</h5>
                <ul>
                    <li><a href="#">Mobile Phones</a></li>
                    <li><a href="#">Computers & Tablets</a></li>
                    <li><a href="#">Computer Accessories</a></li>
                    <li><a href="#">Cameras & Camcorders</a></li>
                    <li><a href="#">Mobile Phone Accessories</a></li>
                </ul>
            </div><!-- single-service -->	

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/3.png')}}" alt="images" class="img-responsive"></div>
                <h5>Real Estate</h5>
                <ul>
                    <li><a href="#">Apartments & Flats</a></li>
                    <li><a href="#">Plots & Land</a></li>
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">Accessories </a></li>
                    <li><a href="#">Houses</a></li>
                </ul>
            </div><!-- single-service -->	

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/4.png')}}" alt="images" class="img-responsive"></div>
                <h5>Sports & Games</h5>
                <ul>
                    <li><a href="#">Sports Equipment</a></li>
                    <li><a href="#">Musical Instruments</a></li>
                    <li><a href="#">Children's Items</a></li>
                    <li><a href="#">Video Games & Consoles</a></li>
                    <li><a href="#">Travel, Events & Tickets</a></li>
                </ul>
            </div><!-- single-service -->	

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/5.png')}}" alt="images" class="img-responsive"></div>
                <h5>Fshion & Beauty</h5>
                <ul>
                    <li><a href="#">Clothing</a></li>
                    <li><a href="#">Watches</a></li>
                    <li><a href="#">Health & Beauty Products</a></li>
                    <li><a href="#">Jewellery</a></li>
                    <li><a href="#">Bags</a></li>
                </ul>
            </div><!-- single-service -->

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/7.png')}}" alt="images" class="img-responsive"></div>
                <h5>Job Openings</h5>
                <ul>
                    <li><a href="#">Delivery/ Collections</a></li>
                    <li><a href="#">BPO/ Telecaller</a></li>
                    <li><a href="#">Data Entry / Back Office</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Sales</a></li>
                </ul>
            </div>
            <!-- single-service -->

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/8.png')}}" alt="images" class="img-responsive"></div>
                <h5>Books & Magazines</h5>
                <ul>
                    <li><a href="#">Equipment</a></li>
                    <li><a href="#">Instruments</a></li>
                    <li><a href="#">Children's</a></li>
                    <li><a href="#">Games & Consoles</a></li>
                    <li><a href="#">Travel, Events </a></li>
                </ul>
            </div><!-- single-service -->

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/9.png')}}" alt="images" class="img-responsive"></div>
                <h5>Home Appliances</h5>
                <ul>
                    <li><a href="#">Furniture</a></li>
                    <li><a href="#">Electricity, AC, </a></li>
                    <li><a href="#">Bathroom & Garden</a></li>
                    <li><a href="#">Home Appliances</a></li>
                    <li><a href="#">Other Home Items</a></li>
                </ul>
            </div><!-- single-service -->

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/11.png')}}" alt="images" class="img-responsive"></div>
                <h5>Music & Arts</h5>
                <ul>
                    <li><a href="#">Drums</a></li>
                    <li><a href="#">Keyboard</a></li>
                    <li><a href="#">Flute</a></li>
                    <li><a href="#">Guitar</a></li>
                    <li><a href="#">Bass  Guitar</a></li>
                </ul>
            </div><!-- single-service -->

            <!-- single-service -->
            <div class="single-service">
                <div class="services-icon"><img src="{{asset('site-assets/images/icon/10.png')}}" alt="images" class="img-responsive"></div>
                <h5>Matrimony Services</h5>
                <ul>
                    <li><a href="#">Love & Care </a></li>
                    <li><a href="#">Honeymoon</a></li>
                    <li><a href="#">Marriage</a></li>
                    <li><a href="#">Love Mate</a></li>
                    <li><a href="#">Other</a></li>
                </ul>
            </div><!-- single-service -->

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

<!-- uses category modal--> 
@include('site.common.categorymodal')
<!-- uses category modal--> 

@endsection
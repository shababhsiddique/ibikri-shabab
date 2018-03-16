@extends('site.master')

@section('siteContent')
<section id="main" class="clearfix myads-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">@lang('site.home')</a></li>
                <li>@lang('site.dashboard')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('site.myads')</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <div class="ads-info">
            <div class="row">
                <div class="col-sm-9">
                    <div class=" section">
                        <h2>@lang('site.myads')</h2>
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <a href="details.html"><img src="{{asset('site-assets/images/trending/1.jpg')}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$800.00</h3>
                                    <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Tv & Video</a></span>
                                    </div>										
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated">Posted On: <a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <span class="visitors">Visitors: 221</span> 
                                    </div>										
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a class="edit-item" href="#" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
                                        <a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="{{asset('site-assets/images/trending/2.jpg')}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$250.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Bark Furniture, Handmade Bespoke Furniture</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Home Appliances</a></span> /
                                        <span><a href="#">Sofa</a></span>
                                    </div>										
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated">Posted On: <a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <span class="visitors">Visitors: 221</span>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a class="edit-item" href="#" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
                                        <a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="{{asset('site-assets/images/trending/3.jpg')}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Samsung Galaxy S6 Edge</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
                                    </div>										
                                </div><!-- ad-info -->									

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated">Posted On: <a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <span class="visitors">Visitors: 221</span> 
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a class="edit-item" href="#" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
                                        <a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="{{asset('site-assets/images/trending/4.jpg')}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$800.00</h3>
                                    <h4 class="item-title"><a href="#">Rick Morton- Magicius Chase</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Books & Magazines</a></span> /
                                        <span><a href="#">Story book</a></span>
                                    </div>										
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated">Posted On: <a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <span class="visitors">Visitors: 221</span> 
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a class="edit-item" href="#" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>
                                        <a class="delete-item" href="#" data-toggle="tooltip" data-placement="top" title="Delete this ad"><i class="fa fa-times"></i></a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->
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
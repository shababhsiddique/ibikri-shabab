@extends('site.master')

@section('siteContent')
<!-- services-ad -->


<!-- main -->
<section id="main" class="clearfix category-page main-categories">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index.html">@lang('Home')</a></li>
                <li>@lang('All Ads')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('All Ads')</h2>
        </div>
        <div class="banner">

            <!-- banner-form -->
            <div class="banner-form banner-form-full">
                <form action="#">
                    <!--category-change font-family: 'Mukti','Ubuntu', sans-serif;-->
                    <div class="dropdown category-dropdown">						
                        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#"><span class="change-text"><i class="fa fa-tags"></i> Select Category</span> <i class="fa fa-angle-down"></i></a>
                    </div><!-- category-change -->

                    <!-- language-dropdown -->
                    <div class="dropdown category-dropdown language-dropdown ">						
                        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/locations')}}" href="#">
                            <span class="change-text" id="location-selector-text"><i class="fa fa-map-marker"></i> United Kingdom</span> <i class="fa fa-angle-down"></i>
                            {!! Form::hidden('city', null, ['id' => 'location-selector-value']) !!}
                        </a>
                    </div><!-- language-dropdown -->

                    <input type="text" class="form-control" placeholder="Type Your key word">
                    <button type="submit" class="form-control" value="Search">Search</button>
                </form>
            </div><!-- banner-form -->
        </div>

        <div class="category-info">	
            <div class="row">
                <!-- accordion-->
                <div class="col-md-4 col-sm-5">
                    <div class="accordion">
                        <!-- panel-group -->
                        <div class="panel-group" id="accordion">

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
                                        <h4 class="panel-title">All Categories<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-one" class="panel-collapse collapse in">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="categories.html"><i class="icofont icofont-laptop-alt"></i>Electronics & Gedget<span>(1029)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-police-car-alt-2"></i>Cars & Vehicles<span>(1228)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-building-alt"></i>Property<span>(178)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-ui-home"></i>Home & Garden<span>(7163)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-animal-dog"></i>Pets & Animals<span>(8709)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-nurse"></i>Health & Beauty<span>(3129)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-hockey"></i>Hobby, Sport & Kids<span>(2019)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-burger"></i>Food & Agriculture<span>(323)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-girl-alt"></i>Women & Children<span>(425)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-gift"></i>Gift & Presentation<span>(3223)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-architecture-alt"></i>Office Product<span>(3283)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-animal-cat-alt-1"></i>Arts, Crafts & Sewing<span>(3221)</span></a></li>
                                            <li><a href="#"><i class="icofont icofont-abc"></i>Others<span>(3129)</span></a></li>
                                        </ul>
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
                                        <h4 class="panel-title">Condition<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-two" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <label for="new"><input type="checkbox" name="new" id="new"> New</label>
                                        <label for="used"><input type="checkbox" name="used" id="used"> Used</label>
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
                                        <h4 class="panel-title">
                                            Price
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-three" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <div class="price-range"><!--price-range-->
                                            <div class="price">
                                                <span>$100 - <strong>$700</strong></span>
                                                <div class="dropdown category-dropdown pull-right">	
                                                    <a data-toggle="dropdown" href="#"><span class="change-text">USD</span><i class="fa fa-caret-square-o-down"></i></a>
                                                    <ul class="dropdown-menu category-change">
                                                        <li><a href="#">$05</a></li>
                                                        <li><a href="#">$10</a></li>
                                                        <li><a href="#">$15</a></li>
                                                        <li><a href="#">$20</a></li>
                                                        <li><a href="#">$25</a></li>
                                                    </ul>								
                                                </div><!-- category-change -->													
                                                <input type="text"value="" data-slider-min="0" data-slider-max="700" data-slider-step="5" data-slider-value="[250,450]" id="price" ><br />
                                            </div>
                                        </div><!--/price-range-->
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-four">
                                        <h4 class="panel-title">
                                            Posted By
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-four" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <label for="individual"><input type="checkbox" name="individual" id="individual"> Individual</label>
                                        <label for="dealer"><input type="checkbox" name="dealer" id="dealer"> Dealer</label>
                                        <label for="reseller"><input type="checkbox" name="reseller" id="reseller"> Reseller</label>
                                        <label for="manufacturer"><input type="checkbox" name="manufacturer" id="manufacturer"> Manufacturer</label>
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-five">
                                        <h4 class="panel-title">
                                            Brand
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-five" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <input type="text" placeholder="Search Brand" class="form-control">
                                        <label for="apple"><input type="checkbox" name="apple" id="apple"> Apple</label>
                                        <label for="htc"><input type="checkbox" name="htc" id="htc"> HTC</label>
                                        <label for="micromax"><input type="checkbox" name="micromax" id="micromax"> Micromax</label>
                                        <label for="nokia"><input type="checkbox" name="nokia" id="nokia"> Nokia</label>
                                        <label for="others"><input type="checkbox" name="others" id="others"> Others</label>
                                        <label for="samsung"><input type="checkbox" name="samsung" id="samsung"> Samsung</label>
                                        <span class="border"></span>
                                        <label for="acer"><input type="checkbox" name="acer" id="acer"> Acer</label>
                                        <label for="bird"><input type="checkbox" name="bird" id="bird"> Bird</label>
                                        <label for="blackberry"><input type="checkbox" name="blackberry" id="blackberry"> Blackberry</label>
                                        <label for="celkon"><input type="checkbox" name="celkon" id="celkon"> Celkon</label>
                                        <label for="ericsson"><input type="checkbox" name="ericsson" id="ericsson"> Ericsson</label>
                                        <label for="fly"><input type="checkbox" name="fly" id="fly"> Fly</label>
                                        <label for="g-fone"><input type="checkbox" name="g-fone" id="g-fone"> g-Fone</label>
                                        <label for="gionee"><input type="checkbox" name="gionee" id="gionee"> Gionee</label>
                                        <label for="haier"><input type="checkbox" name="haier" id="haier"> Haier</label>
                                        <label for="hp"><input type="checkbox" name="hp" id="hp"> HP</label>

                                    </div><!-- panel-body -->
                                </div>
                            </div> <!-- panel -->   
                        </div><!-- panel-group -->
                    </div>
                </div><!-- accordion-->

                <!-- recommended-ads -->
                <div class="col-md-8 col-sm-7 ">				
                    <div class="section recommended-ads">
                        <!-- featured-top -->
                        <div class="featured-top">
                            <h4>Recommended Ads for You</h4>
                            <div class="dropdown pull-right">

                                <!-- category-change -->
                                <div class="dropdown category-dropdown">
                                    <h5>Sort by:</h5>						
                                    <a data-toggle="dropdown" href="#"><span class="change-text">Popular</span><i class="fa fa-caret-square-o-down"></i></a>
                                    <ul class="dropdown-menu category-change">
                                        <li><a href="#">Featured</a></li>
                                        <li><a href="#">Newest</a></li>
                                        <li><a href="#">All</a></li>
                                        <li><a href="#">Bestselling</a></li>
                                    </ul>								
                                </div><!-- category-change -->														
                            </div>							
                        </div><!-- featured-top -->	

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <a href="details.html"><img src="images/listing/1.jpg" alt="Image" class="img-responsive"></a>
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
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
                                    </div>										
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a class="online" href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="images/trending/2.jpg" alt="Image" class="img-responsive"></a>
                                    <span class="featured-ad">Featured</span>
                                    <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Verified"><i class="fa fa-check-square-o"></i></a>
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
                        </div><!-- custom-list-item -->

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="images/trending/3.jpg" alt="Image" class="img-responsive"></a>
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
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="images/trending/4.jpg" alt="Image" class="img-responsive"></a>
                                    <span class="featured-ad">Featured</span>
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
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->					
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/5.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Samsung Slim NoteBook</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
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
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/6.jpg" alt="Image" class="img-responsive"></a>
                                    <span class="featured-ad">Featured</span>
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
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/7.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Philips Streo Headphone</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
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
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/8.jpg" alt="Image" class="img-responsive"></a>
                                    <span class="featured-ad">Featured</span>
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
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	

                        <!-- ad-section -->						
                        <div class="ad-section text-center">
                            <a href="#"><img src="images/ads/3.jpg" alt="Image" class="img-responsive"></a>
                        </div><!-- ad-section -->

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/9.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Nikon Disital Camera</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
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
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/10.jpg" alt="Image" class="img-responsive"></a>
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
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                    </div>									
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/11.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Samsung Mega Monitor</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
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
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	

                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/12.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$800.00</h3>
                                    <h4 class="item-title"><a href="#">Cannon Disital Camera</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Camera & Magazines</a></span> /
                                        <span><a href="#">Story book</a></span>
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
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->					
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/13.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Samsung Smart Watch</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
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
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	
                        <!-- custom-list-item -->
                        <div class="custom-list-item row">
                            <div class="item-image-box col-sm-4">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="https://demo.themeregion.com/trade/images/listing/14.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Accer Thinest Laptop</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics & Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
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
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Individual"><i class="fa fa-user"></i> </a>											
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->	

                        <!-- pagination  -->
                        <div class="text-center">
                            <ul class="pagination ">
                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a>...</a></li>
                                <li><a href="#">10</a></li>
                                <li><a href="#">20</a></li>
                                <li><a href="#">30</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>			
                            </ul>
                        </div><!-- pagination  -->					
                    </div>
                </div><!-- recommended-ads -->

            </div>	
        </div>
    </div><!-- container -->
</section><!-- main -->



<!-- uses category modal--> 
@include('site.common.categorymodal')
<!-- uses category modal--> 

@endsection
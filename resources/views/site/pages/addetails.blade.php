@extends('site.master')
@section('siteContent')
@push('meta')
<meta property="og:url"           content="{{url()->current()}}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{$adDetails->ad_title}}" />
<meta property="og:description"   content="{{$adDetails->short_description}}" />
<meta property="og:image"         content="{{asset('$adDetails->postimages->first()->postimage_thumbnail')}}" />
<style>
    @media print {
        div.slide{
            margin: 0px 0px 20px 0px !important;
            height: 400px !important;
        }
    }
</style>
@endpush

<!-- main -->
<section id="main" class="clearfix details-page">
    <div class="container">
        <div class="breadcrumb-section  hidden-print">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">@lang('Home')</a></li>                
                <li><a href="{{url('all-ads').'?category_id='.$adDetails->subcategory->category->category_id}}">{{$adDetails->subcategory->category->$category_title}}</a></li>
                <li><a href="{{url('all-ads').'?subcategory_id='.$adDetails->subcategory->subcategory_id}}">{{$adDetails->subcategory->$subcategory_title}}</a></li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">{{$adDetails->ad_title}}</h2>
        </div>



        <div class="section slider">					
            <div class="row">
                <!-- carousel -->
                <div class="col-md-7 margin-bottom-60" >
                    <div id="product-carousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-print">
                            @foreach($adDetails->postimages as $indx => $aPostImage)
                            <li data-target="#product-carousel" data-slide-to="{{$indx}}" class="{{($indx?'':'active')}}">
                                <img src="{{asset($aPostImage->postimage_thumbnail)}}" alt="Thumbnail" class="img-responsive">
                            </li>
                            @endforeach                            
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <?php foreach ($adDetails->postimages as $indx => $aPostImage) { ?>
                                <!-- item -->
                                <div class="item {{($indx?'':'active')}}">
                                    <div class="carousel-image">
                                        <!-- image-wrapper -->
                                        <img src="{{asset($aPostImage->postimage_file)}}" alt="{{$adDetails->ad_title}}" class="img-responsive">
                                    </div>
                                </div><!-- item -->
                            <?php } ?>

                        </div><!-- carousel-inner -->

                        <!-- Controls -->
                        <a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
                            <i class="fa fa-chevron-right"></i>
                        </a><!-- Controls -->
                    </div>
                </div><!-- Controls -->	
                <!-- slider-text -->
                <div id='product-infos' class="col-md-5">

                    <div class="slider-text">

                        <h2 class="price">{{currency($adDetails->item_price,'BDT')}}</h2>
                        <h3 class="title">{{$adDetails->ad_title}}</h3>
                        <p>
                            <span><a href="{{url('all-ads').'?category_id='.$adDetails->subcategory->category->category_id}}">{{$adDetails->subcategory->category->$category_title}}</a>/&nbsp;&nbsp;<a href="{{url('all-ads').'?subcategory_id='.$adDetails->subcategory->subcategory_id}}">{{$adDetails->subcategory->$subcategory_title}}</a></span>
                            <span>@lang('Offered by'): <a href="#">{{$adDetails->user->name}}</a></span>
                        </p>
                        <span class="icon"><i class="fa fa-clock-o"></i><a href="#">{{formatDateLocalized($adDetails->created_at) }}</a></span>
                        <span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{$adDetails->user->city->division->$division_title}} - {{$adDetails->user->city->$city_title}}</a></span>
                        <span class="icon"><i class="fa fa-suitcase online"></i><a href="#">{{$usertype[$adDetails->user->user_type]}} <strong>(online)</strong></a></span>

                        <!-- short-info -->
                        <div class="short-info">
                            <h4>@lang("Short Info")</h4>
                            <h4 class="visible-print">{{$adDetails->user->mobile}}</h4>
                            <p><strong>@lang("Condition"): </strong><a href="#">{{__($adDetails->item_condition)}}</a> </p>
                            <p><strong>@lang("Model"): </strong><a href="#">{{$adDetails->model}}</a></p>
                            <p><strong>@lang("Delivery"): </strong><a href="#">{{__($adDetails->delivery)}}</a></p>
                            <p>{{$adDetails->short_description}}</p>
                        </div><!-- short-info -->

                        <!-- contact-with -->
                        <div class="contact-with hidden-print">
                            <h4>@lang("Contact with") </h4>
                            <span class="btn btn-red show-number">
                                <i class="fa fa-phone-square"></i>
                                <span class="hide-text">@lang("Click to show phone number") </span> 
                                <span class="hide-number">{{$adDetails->user->mobile}}</span>
                            </span>
                            <a href="#" class="btn "><i class="fa fa-envelope-square"></i>@lang("Reply by email")</a>
                        </div><!-- contact-with -->

                        <!-- social-links -->
                        <div class="social-links hidden-print">
                            <h4>@lang("Share this ad")</h4>

                            <ul class="list-inline">
                                <li><a class="popupFacebook" data-href="{{url()->current()}}" href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a class="popupTwitter" data-href="{{url()->current()}}" data-text='check it out {{$adDetails->ad_title}} at {{$adDetails->item_price}}-Tk @ibikri.com' href="#"><i class="fa fa-twitter-square"></i></a></li>
                            </ul>
                        </div>
                        <!-- social-links -->						
                    </div>
                </div><!-- slider-text -->				
            </div>				
        </div><!-- slider -->

        <div class="description-info">
            <div class="row">
                <!-- description -->
                <div class="col-md-8">
                    <div class="description">
                        <h4>@lang("Description")</h4>
                        {!! $adDetails->long_description !!}
                    </div>                    
                </div><!-- description -->

                <!-- description-short-info -->
                <div class="col-md-4">					
                    <div class="short-info hidden-print">
                        <br/>
                        <ul>
                            <li><i class="fa fa-user-plus"></i><a href="{{url('ads-by').'/'.$adDetails->user->id.'/'.$adDetails->user->name}}">@lang("Ads by") <span>{{$adDetails->user->name}}</span></a></li>
                            <li><i class="fa fa-print"></i><a href="#" onclick="javascript:window.print();">@lang("Print this ad")</a></li>
                            <li><i class="fa fa-reply"></i><a href="#">@lang("Send to a friend")</a></li>
                            <li><i class="fa fa-heart-o"></i><a href="{{url('favour/'.$adDetails->post_id)}}">@lang("Save ad as Favorite")</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a data-toggle="modal" data-target="#reportModal" href="#">@lang("Report this ad")</a></li>                            
                        </ul>
                        <!-- social-icon -->
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section recommended-ads hidden-print">
                        <div class="featured-top">
                            <h4>@lang("Similar Products")</h4>
                        </div>

                        @foreach($relatedPosts as $anAd)
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-3">
                                <div class="item-image">
                                    <!--asset($anAd->postimages->first()->postimage_thumbnail)-->
                                    <a href='{{url("ad/$anAd->post_id/$anAd->ad_title")}}'><img src="{{asset($anAd->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
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
                        </div>
                        @endforeach
                    </div>
                </div>                
            </div>
        </div><!-- description-info -->	
    </div><!-- container -->
</section><!-- main -->

@include('site.modal.report', ['adDetails' => $adDetails])
@push('scripts')
<script type="text/javascript">$(document).ready(function () {
        prodView('{{url("ajax/view/$adDetails->post_id/".csrf_token())}}');
    });</script> 
@endpush
@endsection
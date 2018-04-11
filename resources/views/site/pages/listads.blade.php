@extends('site.master')

@section('siteContent')
<!-- services-ad -->

<?php
$currentQuery = Illuminate\Support\Facades\Request::query();
?>

<!-- main -->
<section id="main" class="clearfix category-page main-categories">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/')}}">@lang('Home')</a></li>
                <?php
                $headText = __('Ads');
                $locationText = false;
                if (isset($_GET['division_id']) && $_GET['division_id'] != '') {
                    $id = $_GET['division_id'];
                    $locationText = Cache::remember("division$id-$division_title", 60, function() use ($id, $division_title) {
                                return DB::table('divisions')
                                                ->where('division_id', $id)
                                                ->first()->$division_title;
                            });
                    $headText = $locationText;
                }
                if (isset($_GET['city_id']) && $_GET['city_id'] != '') {
                    $id = $_GET['city_id'];
                    $locationText = Cache::remember("city$id-$city_title", 60, function() use ($id, $city_title) {
                                return DB::table('cities')
                                                ->where('city_id', $id)
                                                ->first()->$city_title;
                            });
                    $headText = $locationText;
                }
                if ($locationText) {
                    echo "<li>$locationText</li>";
                }

                $categoryText = false;
                if (isset($_GET['category_id']) && $_GET['category_id'] != '') {
                    $id = $_GET['category_id'];
                    $categoryText = Cache::remember("category$id-$category_title", 60, function() use ($id, $category_title) {
                                return DB::table('categories')
                                                ->where('category_id', $id)
                                                ->first()->$category_title;
                            });
                    $headText = $categoryText;
                }
                if (isset($_GET['subcategory_id']) && $_GET['subcategory_id'] != '') {
                    $id = $_GET['subcategory_id'];
                    $categoryText = Cache::remember("subcategory$id-$subcategory_title", 60, function() use ($id, $subcategory_title) {
                                return DB::table('subcategories')
                                                ->where('subcategory_id', $id)
                                                ->first()->$subcategory_title;
                            });
                    $headText = $categoryText;
                }
                if ($categoryText) {
                    echo "<li>$categoryText</li>";
                }
                ?>
            </ol><!-- breadcrumb -->						
            <h2 class="title"><?php
                if (sizeof($currentQuery) > 0) {
                    echo $headText;
                } else {
                    echo $bigtitle ?? __('All Ads');
                }
                ?></h2>
        </div>
        <div class="banner">
            <!-- search bar -->
            @include('site.common.searchbar')
            <!-- search bar -->
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
                                        <h4 class="panel-title">@lang('All Categories')<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-one" class="panel-collapse collapse in">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($categories as $aCategory)
                                            <li>
                                                <?php
                                                if (isset($_GET['category_id']) && $_GET['category_id'] == $aCategory->category_id) {
                                                    $subCats = Cache::rememberForever("cat-$aCategory->category_id-subcats", function() use ($aCategory) {
                                                                return DB::table('subcategories')
                                                                                ->where('parent_category_id', $aCategory->category_id)
                                                                                ->orderBy('subcategory_weight', 'asc')
                                                                                ->get();
                                                            });

                                                    $currentQuery['category_id'] = $aCategory->category_id;
                                                    $query = http_build_query($currentQuery);
                                                    ?>
                                                    <a href="{{url('all-ads').'?'.$query}}" class="bold">
                                                        <i class="{{$aCategory->category_icon}}"></i>{{$aCategory->$category_title}}<span></span>
                                                    </a>
                                                    <ul class="children">
                                                        @foreach($subCats as $aSubcat)
                                                        <?php
                                                        $currentQuery['subcategory_id'] = $aSubcat->subcategory_id;
                                                        $query = http_build_query($currentQuery);
                                                        ?>
                                                        <li class="cat-item"><a class="<?php
                                                            if (isset($_GET['subcategory_id']) && ($_GET['subcategory_id'] == $aSubcat->subcategory_id)) {
                                                                echo 'bold';
                                                            }
                                                            ?>" href="{{url('all-ads').'?'.$query}}">{{$aSubcat->$subcategory_title}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    <?php
                                                } else {
                                                    unset($currentQuery['subcategory_id']);
                                                    $currentQuery['category_id'] = $aCategory->category_id;
                                                    $query = http_build_query($currentQuery);
                                                    ?>
                                                    <a href="{{url('all-ads').'?'.$query}}" >
                                                        <i class="{{$aCategory->category_icon}}"></i>{{$aCategory->$category_title}}<span></span>
                                                    </a>
                                                    <?php
                                                }
                                                ?>     
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
                                        <h4 class="panel-title">@lang('Condition')<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-two" class="panel-collapse collapse {{$condition_collapse}}">
                                    <!-- panel-body -->
                                    <div class="panel-body item_condition">

                                        @if (isset($_GET['item_condition']) && $_GET['item_condition'] == 'New')                                        
                                        <input type="radio" name="item_condition" form="search-bar-form"  id="all" value="all"/> <label class="unstyled" for="all">@lang('All')</label> <br/>
                                        <input checked="" type="radio" name="item_condition" form="search-bar-form"  id="New" value="New"/> <label class="unstyled" for="New">@lang('New')</label> <br/>
                                        <input type="radio" name="item_condition" form="search-bar-form"  id="Used" value="Used"/> <label class="unstyled" for="Used">@lang('Used')</label>
                                        @elseif(isset($_GET['item_condition']) && $_GET['item_condition'] == 'Used')

                                        <input type="radio" name="item_condition" form="search-bar-form"  id="all" value="all"/> <label class="unstyled" for="all">@lang('All')</label> <br/>
                                        <input type="radio" name="item_condition" form="search-bar-form"  id="New" value="New"/> <label class="unstyled" for="New">@lang('New')</label> <br/>
                                        <input checked="" type="radio" name="item_condition" form="search-bar-form"  id="Used" value="Used"/> <label class="unstyled" for="Used">@lang('Used')</label>
                                        @else                                        
                                        <input type="radio" name="item_condition" form="search-bar-form"  id="all" value="all"/> <label class="unstyled" for="all">@lang('All')</label> <br/>
                                        <input type="radio" name="item_condition" form="search-bar-form"  id="New" value="New"/> <label class="unstyled" for="New">@lang('New')</label> <br/>
                                        <input type="radio" name="item_condition" form="search-bar-form"  id="Used" value="Used"/> <label class="unstyled" for="Used">@lang('Used')</label>
                                        @endif
                                    </div><!-- panel-body -->                                    
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
                                        <h4 class="panel-title">
                                            @lang('Price')
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-three" class="panel-collapse collapse">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <div class="price-range"><!--price-range-->
                                            <div class="price">
                                                <span>{{currency(1000,'BDT')}} - <strong>{{currency(100000,'BDT')}}</strong></span>
                                                <input form="search-bar-form" 
                                                       name='price_range' 
                                                       type="text"
                                                       data-slider-min="1000" 
                                                       data-slider-max="100000"
                                                       data-slider-step="1000"
                                                       data-slider-value="[2000,90000]"
                                                       id="price" ><br />
                                                <button class="btn btn-success pull-right" type="submit" form="search-bar-form"><i class="fa fa-refresh"></i></button>
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
                                            @lang('Advertizer Type')
                                            <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-four" class="panel-collapse collapse {{$sellertype_collapse}}">
                                    <!-- panel-body -->
                                    <div class="panel-body user_type">

                                        @if (isset($_GET['user_type']) && $_GET['user_type'] == '0')                                        
                                        <input type="radio" name="user_type" form="search-bar-form"  id="all" value="all" /> <label class="unstyled" for="all">@lang('All')</label> <br/>
                                        <input checked="" type="radio" name="user_type" form="search-bar-form"  id="individual" value="0"/> <label class="unstyled" for="individual">@lang('Individual')</label> <br/>
                                        <input type="radio" name="user_type" form="search-bar-form"  id="dealer" value="1"/> <label class="unstyled" for="dealer">@lang('Dealer')</label>                                               
                                        @elseif(isset($_GET['user_type']) && $_GET['user_type'] == '1')                                        
                                        <input type="radio" name="user_type" form="search-bar-form"  id="all" value="all" /> <label class="unstyled" for="all">@lang('All')</label> <br/>
                                        <input type="radio" name="user_type" form="search-bar-form"  id="individual" value="0"/> <label class="unstyled" for="individual">@lang('Individual')</label> <br/>
                                        <input checked="" type="radio" name="user_type" form="search-bar-form"  id="dealer" value="1"/> <label class="unstyled" for="dealer">@lang('Dealer')</label>                                               
                                        @else                                        
                                        <input checked="" type="radio" name="user_type" form="search-bar-form"  id="all" value="all" /> <label class="unstyled" for="all">@lang('All')</label> <br/>
                                        <input type="radio" name="user_type" form="search-bar-form"  id="individual" value="0"/> <label class="unstyled" for="individual">@lang('Individual')</label> <br/>
                                        <input type="radio" name="user_type" form="search-bar-form"  id="dealer" value="1"/> <label class="unstyled" for="dealer">@lang('Dealer')</label>                                               
                                        @endif

                                    </div>
                                    <!-- panel-body -->
                                </div>
                            </div><!-- panel -->
                            @push('scripts')
                            <script>
                                $(".item_condition input, .user_type input").on('click', function () {
                                    $("#search-bar-form").submit();
                                });
                            </script>
                            @endpush


                        </div><!-- panel-group -->
                    </div>
                </div><!-- accordion-->


                <div class="col-md-8 col-sm-7">				
                    <div class="section recommended-ads">
                        <!-- featured-top -->
                        <div class="featured-top">
                            <h5>{{number($number_of_results)}} @lang('results')</h5>						
                            <!--Showing {{sizeof($ads)}} results-->
                            <div class="dropdown pull-right">
                                <!-- category-change -->

                                <div class="dropdown category-dropdown">                                    
                                    <a data-toggle="dropdown" href="#"><span class="change-text">{{$order_by}}</span><i class="fa fa-caret-square-o-down"></i></a>
                                    <ul class="dropdown-menu category-change order-by-change">
                                        <?php
                                        $currentQuery = Illuminate\Support\Facades\Request::query();
                                        $currentQuery['order_by'] = 'view';
                                        $query = http_build_query($currentQuery);
                                        ?>
                                        <li><a href="{{url('all-ads').'?'.$query}}">@lang('Popular First')</a></li>
                                        <li class="nav-divider"></li>
                                        <?php
                                        $currentQuery['order_by'] = 'new';
                                        $query = http_build_query($currentQuery);
                                        ?>
                                        <li><a href="{{url('all-ads').'?'.$query}}">@lang('Newest First')</a></li>
                                        <?php
                                        $currentQuery['order_by'] = 'old';
                                        $query = http_build_query($currentQuery);
                                        ?>
                                        <li><a href="{{url('all-ads').'?'.$query}}">@lang('Oldest First')</a></li>
                                        <li class="nav-divider"></li>
                                        <?php
                                        $currentQuery['order_by'] = 'price_up';
                                        $query = http_build_query($currentQuery);
                                        ?>
                                        <li><a href="{{url('all-ads').'?'.$query}}">@lang('Price Ascending')</a></li>
                                        <?php
                                        $currentQuery['order_by'] = 'price_down';
                                        $query = http_build_query($currentQuery);
                                        ?>
                                        <li><a href="{{url('all-ads').'?'.$query}}">@lang('Price Descending')</a></li>
                                    </ul>								
                                </div><!-- category-change -->														
                            </div>							
                        </div><!-- featured-top -->	


                        <!-- list 2 top products -->
                        @foreach($topAds as $aTopAd)                        
                        <div class="custom-list-item row custom-featured">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <a href='{{url("ad/$aTopAd->post_id/$aTopAd->ad_title")}}'><img src="{{asset($aTopAd->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                    <!--<i class="top-ad">Featured</i>-->
                                    <a href="#" class="verified" data-toggle="tooltip" data-placement="left" title="Top Ad"><i class="fa fa-star"></i></a>
                                    <a href="#" class=" top-ad-ri" data-toggle="tooltip" data-placement="left" title="Top Ad">@lang('Top Ad')</a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">{{currency($aTopAd->item_price,'BDT')}}</h3>
                                    <h4 class="item-title"><a href='{{url("ad/$aTopAd->post_id/$aTopAd->ad_title")}}'>{{$aTopAd->ad_title}}</a></h4>
                                    <div class="item-cat">
                                        <span><a href="{{url('all-ads').'?category_id='.$aTopAd->category_id}}">{{$aTopAd->$category_title}}</a></span> /
                                        <span><a href="{{url('all-ads').'?subcategory_id='.$aTopAd->subcategory_id}}">{{$aTopAd->$subcategory_title}}</a></span>
                                    </div>										
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">{{ formatDateLocalized($aTopAd->created_at) }} </a></span>
                                        <a href="{{url('all-ads').'?item_condition='.$aTopAd->item_condition}}" class="tag"><i class="fa fa-tags"></i> {{__($aTopAd->item_condition)}}</a>
                                    </div>										
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="{{url('all-ads').'?city_id='.$aTopAd->city_id}}" data-toggle="tooltip" data-placement="top" title="{{$aTopAd->$city_title}}"><i class="fa fa-map-marker"></i> </a>
                                        <a class="" href="{{url('ads-by').'/'.$aTopAd->user_id.'/'.$aTopAd->name}}" data-toggle="tooltip" data-placement="top" title="{{$usertype[$aTopAd->user_type]}}"><i class="fa fa-{{($aTopAd->user_type == 0)?'user':'suitcase'}}"></i> </a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div><!-- custom-list-item -->
                        @endforeach    
                        
                        <!-- list all products by query -->
                        @foreach($ads as $anAd)                        
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <!--asset($anAd->postimages->first()->postimage_thumbnail)-->
                                    <a href='{{url("ad/$anAd->post_id/$anAd->ad_title")}}'><img src="{{asset($anAd->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
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
                                        <a href="{{url('all-ads').'?item_condition='.$anAd->item_condition}}" class="tag"><i class="fa fa-tags"></i> {{__($anAd->item_condition)}}</a>
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

                        <!-- pagination  -->
                        <div class="text-center">
                            {{ $ads->links() }}
                        </div>
                        <!-- pagination  -->					
                    </div>
                </div>
            </div>	
        </div>
    </div><!-- container -->
</section><!-- main -->

@push('styles')
<script type="text/javascript">
    var newURL = location.href.split("?")[0] + '';
//    window.history.pushState('object', document.title, newURL);
</script>
@endpush
@endsection
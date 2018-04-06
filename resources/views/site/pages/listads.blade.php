@extends('site.master')

@section('siteContent')
<!-- services-ad -->

<?php
/* Prep languages */
//$usertype = [];
//$usertype[0] = __('Individual');
//$usertype[1] = __('Dealer');
//
//$category_title = __('category_title_en');
//$subcategory_title = __('subcategory_title_en');
//$division_title = __('division_title_en');
//$city_title = __('city_title_en');

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
                                    </div>
                                    <!-- panel-body -->
                                </div>
                            </div><!-- panel -->


                        </div><!-- panel-group -->
                    </div>
                </div><!-- accordion-->

                <!-- recommended-ads -->
                <div class="col-md-8 col-sm-7 ">				
                    <div class="section recommended-ads">
                        <!-- featured-top -->
                        <div class="featured-top">
                            <!--Showing {{sizeof($ads)}} results-->
                            <div class="dropdown pull-right">
                                <!-- category-change -->
                                <div class="dropdown category-dropdown">
                                    <h5>Sort by:</h5>						
                                    <a data-toggle="dropdown" href="#"><span class="change-text">Newest</span><i class="fa fa-caret-square-o-down"></i></a>
                                    <ul class="dropdown-menu category-change">
                                        <li><a href="#">Featured</a></li>
                                        <li><a href="#">Newest</a></li>
                                        <li><a href="#">All</a></li>
                                    </ul>								
                                </div><!-- category-change -->														
                            </div>							
                        </div><!-- featured-top -->	


                        <!-- custom-list-item -->
                        @foreach($ads as $anAd)                        
                        <div class="custom-list-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-4">
                                <div class="item-image">
                                    <!--asset($anAd->postimages->first()->postimage_thumbnail)-->
                                    <a href="details.html"><img src="{{asset($anAd->postimage_thumbnail)}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-8">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">{{$anAd->item_price}} - @lang('BDT')</h3>
                                    <h4 class="item-title"><a href='{{url("ad/$anAd->post_id/$anAd->ad_title")}}'>{{$anAd->ad_title}}</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">{{$anAd->$category_title}}</a></span> /
                                        <span><a href="#">{{$anAd->$subcategory_title}}</a></span>
                                    </div>										
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">{{date('d-m-Y',strtotime($anAd->created_at))}} </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> {{__($anAd->item_condition)}}</a>
                                    </div>										
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="{{$anAd->$city_title}}"><i class="fa fa-map-marker"></i> </a>
                                        <a class="" href="#" data-toggle="tooltip" data-placement="top" title="{{$usertype[$anAd->user_type]}}"><i class="fa fa-{{($anAd->user_type == 0)?'user':'suitcase'}}"></i> </a>											
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


@endsection
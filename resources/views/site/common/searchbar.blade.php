<?php
$subcategory_title_col = __("subcategory_title_en");
$category_title_col = __("category_title_en");
$city_title_col = __("city_title_en");
$division_title_col = __("division_title_en");

$categoryText = __("Please Select");
if (isset($_GET['category_id']) && $_GET['category_id'] != '') {
    $id = $_GET['category_id'];
    $categoryText = Cache::remember("category$id-$category_title_col", 60, function() use ($id, $category_title_col) {
                return DB::table('categories')
                                ->where('category_id', $id)
                                ->first()->$category_title_col;
            });
}
if (isset($_GET['subcategory_id']) && $_GET['subcategory_id'] != '') {
    $id = $_GET['subcategory_id'];
    $categoryText = Cache::remember("subcategory$id-$subcategory_title_col", 60, function() use ($id, $subcategory_title_col) {
                return DB::table('subcategories')
                                ->where('subcategory_id', $id)
                                ->first()->$subcategory_title_col;
            });
}

$locationText = __("Please Select");
if (isset($_GET['division_id']) && $_GET['division_id'] != '') {
    $id = $_GET['division_id'];
    $locationText = Cache::remember("division$id-$division_title_col", 60, function() use ($id, $division_title_col) {
                return DB::table('divisions')
                                ->where('division_id', $id)
                                ->first()->$division_title_col;
            });
}
if (isset($_GET['city_id']) && $_GET['city_id'] != '') {
    $id = $_GET['city_id'];
    $locationText = Cache::remember("city$id-$city_title_col", 60, function() use ($id, $city_title_col) {
                return DB::table('cities')
                                ->where('city_id', $id)
                                ->first()->$city_title_col;
            });
}

$currentQuery = Illuminate\Support\Facades\Request::query();
?>

<div class="banner-form banner-form-full">
    {!! Form::open(['url' => 'all-ads','method' => 'get']) !!}

    <!-- Location -->
    <div class="dropdown category-dropdown">						
        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/locations')}}" href="#">
            <span class="change-text" id="location-selector-text"><i class="fa fa-map-marker"></i> {{$locationText}}</span> <i class="fa fa-angle-down"></i>                            
        </a>
        {!! Form::hidden('city_id', null, ['id' => 'location-selector-value']) !!}
    </div>
    <!-- Location -->    
    
    <!--category-change -->
    <div class="dropdown category-dropdown">						
        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#">
            <span class="change-text" id="category-selector-text"><i class="fa fa-tags"></i> {{$categoryText}}</span> <i class="fa fa-angle-down"></i>
        </a>
        {!! Form::hidden('subcategory_id', null, ['id' => 'category-selector-value']) !!}
    </div>
    <!-- category-change -->

    {!! Form::text('q',null, [ "class"=>"form-control" , "placeholder"=>"What are you looking for ?"  ]) !!}                    


    
    <button type="submit" class="form-control" value="Search">@lang('Search')</button>
    {!! Form::close()!!}
</div><!-- banner-form -->

@push('modals')

@include('site.common.categorymodal')

@endpush
@extends('site.master')
@section('siteContent')

<?php
$page_title = __('page_title_en');
$page_body = __('page_body_en');
?>
<!-- main -->
<section id="main" class="clearfix page">
    <div class="container">
        <div class="faq-page">
            <div class="breadcrumb-section">
                <!-- breadcrumb -->
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">@lang('Home')</a></li>
                    <li>{{$page->page_slug}}</li>
                </ol><!-- breadcrumb -->						
                <h2 class="title">{{$page->$page_title}}</h2>
            </div>

            {!! $page->$page_body !!}

        </div><!-- faq-page -->
    </div><!-- container -->
    
</section>


@endsection
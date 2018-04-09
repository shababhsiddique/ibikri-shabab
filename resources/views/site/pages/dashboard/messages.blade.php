@extends('site.master')
@section('siteContent')
@push("styles")
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
@endpush

<section id="main" class="clearfix myads-page">
    <div class="container">

        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{url('/dashboard')}}">@lang('Home')</a></li>
                <li>@lang('Favourites')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('My Favourites')</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <div class="ads-info">
            <div class="row">
                <div class="col-md-12">
                    <div class="section">                        
                        <div id="vue-app">
                            <h3>Threads</h3>
                            <button v-on:click="getThreads">get</button>
                            <ul class="list-group">
                                <li class="list-group-item" v-for='(thread, index) in threads'>
                                    <a v-bind:href="thread.link"><strong>@{{thread.name}}</strong></a>
                                    <p>@{{thread.email}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div>
        <!-- row -->
    </div><!-- container -->
</section><!-- myads-page -->
@push("scripts")
<script src="{{asset('site-assets/js/app.js')}}"></script>
@endpush
@endsection
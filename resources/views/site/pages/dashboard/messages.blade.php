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
                            <h3>Inbox</h3>                            
                            <ul class="list-group">
                                <li class="list-group-item" v-for='(thread, index) in threads'>
                                    <a v-bind:href="messageUrl(thread.thread,thread.sender_id,thread.receiver_id)"><strong>@{{thread.sender}} , @{{thread.receiver}} <span class="badge" v-if="thread.unread > 0">@{{thread.unread}}</span></strong></a>
                                    <p>@{{thread.message}}</p>
                                </li>
                            </ul>
                            <!--<button v-on:click="getThreads">refresh</button>-->
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div>
        <!-- row -->
    </div><!-- container -->
</section><!-- myads-page -->
@push("scripts")
<script type="text/javascript">
    new Vue({
        el: '#vue-app',
        data: {
            name: 'Shabab',
            threads: [
               
            ]
        },
        created: function(){
            var self = this;
            setInterval(self.getThreads,5000);      
            self.getThreads();
        },
        methods: {
            messageUrl: function(code, sid, rid){
                return "<?php echo url('message')?>/"+code+"/"+sid+"/"+rid;
            },
            getThreads: function () {
                var self = this;
                $.ajax({
                    type: "GET",
                    url: "<?php echo url('api/threads/'. base64_url_encode($userId))?>",
                    dataType: "json",
                    success: function (result) {
                        self.threads = result;
                    }
                });
            }
        }
    });
</script>
@endpush
@endsection
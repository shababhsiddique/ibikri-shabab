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
                <li>@lang('Message')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('My Favourites')</h2>
        </div><!-- banner -->

        @include('site.pages.dashboard.menu')			

        <div class="ads-info">
            <div class="row">
                <div class="col-md-12">
                    <div class="section">                        
                        <div id="vue-messages">
                            <h3>Threads</h3>
                            <button v-on:click="getThreads">get</button>
                            <ul class="list-group">
                                <li class="list-group-item" v-for='(thread, index) in threads'>
                                    <a v-bind:href="thread.link"><strong>@{{thread.user_one}} to @{{thread.user_two}}</strong></a>
                                    <p>@{{thread.message}}</p>
                                </li>
                                <li class="list-group-item">
                                    <p>@{{newmessage}}</p>
                                </li>
                            </ul>
                            <form>
                                <input type="text" ref="messageComposer">
                                <button @click.prevent="submitNewMessage()">Send</button>
                            </form>
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
        el: '#vue-messages',
        data: {
            newmessage: 'none',
            threads: [
               
            ]
        },
        methods: {
            getThreads: function() {
                var self = this;
                $.ajax({
                    type: "GET",
                    url: "<?php echo url('api/message/'.$receiver_id)?>",
                    //url: "https://jsonplaceholder.typicode.com/users",
                    dataType: "json",
                    success: function(result) {
                        self.threads = result;
                    }
                });
            },
            submitNewMessage () {
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo url('api/submitmessage')?>",
                    data: {
                       _token : '{{csrf_token()}}',
                       user_one: '<?php echo Auth::user()->id ?>',
                       user_two: '{{$receiver_id}}', 
                       message: this.$refs.messageComposer.value  
                    },
                    dataType: "json",
                    success: function(result) {
                        this.newmessage = result;
                    }
                });
                this.newmessage = this.$refs.messageComposer.value
            }

        }
    });
</script>
@endpush
@endsection
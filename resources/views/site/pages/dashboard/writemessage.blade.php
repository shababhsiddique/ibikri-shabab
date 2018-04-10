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
                            <h3>{{$user_other_name}}</h3>                            
                            <ul class="list-group">
                                <li v-bind:class="getMessageClass(thread.sender_id, thread.read_status)" v-for='thread in threads'>
                                    <a><strong>@{{thread.sender}}</strong></a>
                                    <p>@{{thread.message}}</p>
                                </li>
                            </ul>
                            <!--<button v-on:click="getMessagesInThread">refresh</button>-->
                            <form class="margin-bottom-60">
                                <div class="form-group">
                                    <textarea id="messageComposerInput" class="form-control" ref="messageComposer" autofocus></textarea>
                                </div>                                
                                <div class="form-group">
                                    <button class="btn btn-primary pull-right" @click.prevent="submitNewMessage()">@lang('Send')</button>
                                </div>
                                <!--<input class="form-control chat-composer" type="text" ref="messageComposer">-->                                
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
        created: function () {
            var self = this;
//            setTimeout (self.getMessagesInThread,5000);
            this.getMessagesInThread();
        },
        mounted: function () {
            console.log("ya");
            setInterval(function () {
                $('#messageComposerInput').focus();
            }, 1000);
//            this.$nextTick(function () {
//              $('#messageComposerInput').focus();
//            });
        },
        methods: {
            getMessagesInThread: function () {
                var self = this;
                $.ajax({
                    type: "GET",
                    url: "<?php echo url('api/thread/' . $thread.'/'.$user_logged) ?>",
                    dataType: "json",
                    success: function (result) {
                        self.threads = result;
                        setTimeout(self.getMessagesInThread, 5000);
                    }
                });
//                $('#messageComposerInput').focus();
            },
            getMessageClass(sender_id, read_status) {

                var css = 'list-group-item';
                if (sender_id === <?php echo $user_logged ?>) {
                    css = css + " iSentIt";
                } else {
                    css = css + " otherGuyDid";
                    if (read_status === 1) {
                        css = css + " msg-read";
                    } else {
                        css = css + " msg-unread";
                    }
                }
                return css;
            },
            submitNewMessage() {
                var self = this;
                var msgTyped = this.$refs.messageComposer.value;

                $.ajax({
                    type: "POST",
                    url: "<?php echo url('api/submitmessage') ?>",
                    data: {
                        _token: '{{csrf_token()}}',
                        sender_id: '<?php echo $user_logged ?>',
                        receiver_id: '<?php echo $user_other ?>',
                        thread: '{{$thread}}',
                        message: msgTyped
                    },
                    dataType: "json",
                    success: function (result) {
                        console.log("its gone");
                        self.threads.push({
                            sender_id: <?php echo $user_logged ?>,
                            sender: "<?php echo $user_logged_name ?>",
                            message: msgTyped
                        });
//                        self.getMessagesInThread();
                    }
                });
                this.$refs.messageComposer.value = "";


            }

        }
    });


</script>
@endpush
@endsection
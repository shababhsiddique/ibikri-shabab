@extends('site.master')
@section('notification')
<?php
$msg = Session::get('message');

if (isset($msg)) {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var title = "{{ $msg['title']?? '' }}";
            var msg = "{{ $msg['body']?? '' }}";
            var type = "{{ $msg['type']?? '' }}";
            makeNotification(type,title,msg);
            console.log("woo hoo");
        });
    </script>
    <?php
    Session::forget('message');
}
?>
@endsection
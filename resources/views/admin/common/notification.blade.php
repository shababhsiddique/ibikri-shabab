@extends('admin.master')
@section('adminNotification')

<?php
$msg = Session::get('message');

if (isset($msg)) {   
    ?>          
    <div class="callout alert alert-{{ $msg['type'] }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>{{ $msg['title'] }}</h4>
        {{ $msg['body'] }}
    </div>
    <?php
    Session::forget('message');
}
?>

@endsection
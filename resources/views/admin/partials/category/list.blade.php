@extends('admin.master')
@section('adminContent')

<link rel="stylesheet" href="{{asset('site-assets/css/icofont/css/icofont.css')}}">

<div class="row">    
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Categories (click one to view children)</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    
                    <div class="col-md-6">
                        <ul class="list-group">
                            @foreach($categories as $aCategory)
                            <li class="list-group-item">
                                <a data-toggle="tab" href="#category{{$aCategory->category_id}}"><i class="{{$aCategory->category_icon}}"></i> <img src="{{asset($aCategory->category_image)}}" width="20"/>&nbsp;&nbsp; {{$aCategory->category_title_bn}} ({{$aCategory->category_title_en}})</a>
                                <a class="pull-right" href="{{url('/admin/category/edit/'.$aCategory->category_id)}}"><i class="fa fa-pencil"></i></a>
                            </li>
                            @endforeach
                        </ul>                                    
                    </div>
                    <div class="col-md-6 tab-content">
                        <div class="list-group tab-pane" id="category1">
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item active" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                        </div>
                        <div class="list-group tab-pane" id="category2">
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                            <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                        </div>
                    </div>
                </div> 
            </div>            
        </div>
        <!-- /.box -->    
    </div>    
</div>
<!-- /.row -->

@endsection
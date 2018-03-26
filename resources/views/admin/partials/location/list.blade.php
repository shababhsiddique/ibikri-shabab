@extends('admin.master')
@section('adminContent')
<link rel="stylesheet" href="{{asset('site-assets/css/icofont/css/icofont.css')}}">

<div class="row">    
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Divisions (click one to view cities)</h3>
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
                            @foreach($divisions as $aDivision)
                            <li class="list-group-item">
                                <a data-toggle="tab" href="#division{{$aDivision->division_id}}"><i class="{{$aDivision->division_icon}}"></i>&nbsp;&nbsp; {{$aDivision->division_title_en}} ({{$aDivision->division_title_bn}})</a>
                                <a class="pull-right" href="{{url('/admin/division/edit/'.$aDivision->division_id)}}"><i class="fa fa-pencil"></i></a>
                            </li>
                            @endforeach
                        </ul>                                    
                    </div>
                    <div class="col-md-6 tab-content">
                        <?php
                        foreach ($divisions as $aDivision) {
                            $cities = App\Models\City::where('division_id', $aDivision->division_id)->get();
                            ?>
                            <div class="list-group tab-pane" id="division{{$aDivision->division_id}}">
                                @foreach($cities as $aCity)                                
                                <a class="list-group-item" href="{{url('admin/city/edit/'.$aCity->city_id)}}">{{$aCity->city_title_bn}} ({{$aCity->city_title_en}})</a>
                                @endforeach
                            </div>
                        <?php }
                        ?>                        
                    </div>
                </div> 
            </div>            
        </div>
        <!-- /.box -->    
    </div>    
</div>
<!-- /.row -->

@endsection
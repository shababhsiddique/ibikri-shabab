@extends('admin.master')
@section('adminContent')

<div class="row">    
    <!-- left column -->
    <div class="col-md-9">
        <!-- general form elements -->
        <div class="box box-primary">
            
            @if(isset($oldCityData))
            {!! Form::model($oldCityData,['class' => 'form-horizontal' , 'url' => 'admin/city/save-city','method' => 'post']) !!}
            <input type="hidden" name="city_id" value="{{$oldCityData->city_id}}" />            
            <?php $process = "Update"; ?>
            @else
            {!! Form::open(['class' => 'form-horizontal' , 'url' => 'admin/city/save-city','method' => 'post']) !!}
            <?php $process = "Create"; ?>
            @endif
            
            
            <div class="box-header with-border">
                <h3>{{$process}} Location</h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body">

                <div class="form-group">
                    <label for="division_id" class="col-sm-3 control-label">Parent Division</label>
                    <div class="col-sm-9">
                        <?php
                        $divisions = App\Models\Division::all();
                        $divisionArray = array();
                        foreach ($divisions as $aDivision) {
                            $divisionArray[$aDivision->division_id] = $aDivision->division_title_en . "($aDivision->division_title_bn)";
                        }
                        ?>
                        {!! Form::select('division_id',$divisionArray, null, ['class' => 'form-control select2'] ) !!}                        
                        @if ($errors->has('division_id'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('division_id') }}
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="city_title_en" class="col-sm-3 control-label">Location Name (English)</label>
                    <div class="col-sm-9">
                        {!! Form::text('city_title_en', null, ['class' => 'form-control', 'autofocus' => 'true']) !!}                        
                        @if ($errors->has('city_title_en'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('city_title_en') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="city_title_bn" class="col-sm-3 control-label">Location Name (Bengali)</label>

                    <div class="col-sm-9">
                        {!! Form::text('city_title_bn', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('city_title_bn'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('city_title_bn') }}
                        </span>
                        @endif
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="city_weight" class="col-sm-3 control-label">Location Weight</label>

                    <div class="col-sm-3">
                        {!! Form::number('city_weight', 0, ['class' => 'form-control' ]) !!}
                        @if ($errors->has('city_weight'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('city_weight') }}
                        </span>
                        @endif
                    </div>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">                    
                <div class="form-group">                    
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-lg">{{$process}} Location</button>
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->

            {!! Form::close() !!}       
        </div>
        <!-- /.box -->    
    </div>    
    
</div>
<!-- /.row -->

@endsection
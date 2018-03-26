@extends('admin.master')
@section('adminContent')

<div class="row">    
    <!-- left column -->
    <div class="col-md-9">
        <!-- general form elements -->
        <div class="box box-primary">
            
            @if(isset($oldDivisionData))
            {!! Form::model($oldDivisionData,['class' => 'form-horizontal' , 'url' => 'admin/division/save-division','method' => 'post']) !!}
            <input type="hidden" name="division_id" value="{{$oldDivisionData->division_id}}" />            
            <?php $process = "Update"; ?>
            @else
            {!! Form::open(['class' => 'form-horizontal' , 'url' => 'admin/division/save-division','method' => 'post']) !!}
            <?php $process = "Create"; ?>
            @endif
            
            
            <div class="box-header with-border">
                <h3>{{$process}} Division</h3>
            </div>
            <!-- /.box-header -->

                  
            


            <div class="box-body">

                <div class="form-group">
                    <label for="division_title_en" class="col-sm-3 control-label">Division Name (English)</label>
                    <div class="col-sm-9">
                        {!! Form::text('division_title_en', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('division_title_en'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('division_title_en') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="division_title_bn" class="col-sm-3 control-label">Division Name (Bengali)</label>

                    <div class="col-sm-9">
                        {!! Form::text('division_title_bn', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('division_title_bn'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('division_title_bn') }}
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="division_icon" class="col-sm-3 control-label">Division Icon Class</label>
                    <div class="col-sm-9">
                        {!! Form::text('division_icon', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('division_icon'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('division_icon') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="division_weight" class="col-sm-3 control-label">Division Weight</label>

                    <div class="col-sm-3">
                        {!! Form::number('division_weight', 0, ['class' => 'form-control' ]) !!}
                        @if ($errors->has('division_weight'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('division_weight') }}
                        </span>
                        @endif
                    </div>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">                    
                <div class="form-group">                    
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-lg">{{$process}} Division</button>
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
@extends('admin.master')
@section('adminContent')

<div class="row">    
    <!-- left column -->
    <div class="col-md-9">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Create Page</h3>
            </div>
            <!-- /.box-header -->

            @if(isset($oldPageData))
            {!! Form::model($oldPageData,['class' => 'form-horizontal' , 'url' => 'admin/page/save-page','method' => 'post']) !!}
            <input type="hidden" name="page_id" value="{{$oldPageData->page_id}}" />
            <?php $process = "Update"; ?>
            @else
            {!! Form::open(['class' => 'form-horizontal' , 'url' => 'admin/page/save-page','method' => 'post']) !!}
            <?php $process = "Create"; ?>
            @endif

            <div class="box-body">

                <div class="form-group">
                    <label for="page_slug" class="col-sm-3 control-label">Page URL string</label>
                    <div class="col-sm-5">
                        {!! Form::text('page_slug', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('page_slug'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('page_slug') }}
                        </span>
                        @endif
                    </div>
                </div>

                
                <div class="form-group">
                    <label for="page_title_en" class="col-sm-3 control-label">Page Title (English)</label>
                    <div class="col-sm-9">
                        {!! Form::text('page_title_en', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('page_title_en'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('page_title_en') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="page_title_bn" class="col-sm-3 control-label">Page Title (Bengali)</label>

                    <div class="col-sm-9">
                        {!! Form::text('page_title_bn', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('page_title_bn'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('page_title_bn') }}
                        </span>
                        @endif
                    </div>
                </div>

                

                <div class="form-group">
                    <label for="page_body_en" class="col-sm-3 control-label">Page Body (English)</label>

                    <div class="col-sm-9">
                        {!! Form::textarea('page_body_en', null, [ 'rows'=> '20', 'class' => 'ckeditor form-control']) !!}                        
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="page_body_bn" class="col-sm-3 control-label">Page Body (Bengali)</label>

                    <div class="col-sm-9">
                        {!! Form::textarea('page_body_bn', null, [ 'rows'=> '20', 'class' => 'ckeditor form-control']) !!}                        
                    </div>
                </div>



            </div>
            <!-- /.box-body -->
            <div class="box-footer">                    
                <div class="form-group">                    
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-lg">{{$process}} Page</button>
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
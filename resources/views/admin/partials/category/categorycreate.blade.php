@extends('admin.master')
@section('adminContent')

<div class="row">    
    <!-- left column -->
    <div class="col-md-9">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3>Create Category</h3>
            </div>
            <!-- /.box-header -->

            @if(isset($oldCategoryData))
            {!! Form::model($oldCategoryData,['class' => 'form-horizontal' , 'url' => 'admin/category/save-category','method' => 'post','enctype'=> 'multipart/form-data']) !!}
            <input type="hidden" name="category_id" value="{{$oldCategoryData->category_id}}" />
            <input type="hidden" name="category_image_old" value="{{$oldCategoryData->category_image_old}}" />
            <?php $process = "Update"; ?>
            @else
            {!! Form::open(['class' => 'form-horizontal' , 'url' => 'admin/category/save-category','method' => 'post','enctype'=> 'multipart/form-data']) !!}
            <?php $process = "Create"; ?>
            @endif

            <div class="box-body">


                <div class="form-group">
                    <label for="category_title_en" class="col-sm-3 control-label">Category Name (English)</label>
                    <div class="col-sm-9">
                        {!! Form::text('category_title_en', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('category_title_en'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('category_title_en') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_title_bn" class="col-sm-3 control-label">Category Name (Bengali)</label>

                    <div class="col-sm-9">
                        {!! Form::text('category_title_bn', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('category_title_bn'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('category_title_bn') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_image" class="col-sm-3 control-label">Category Image</label>
                    <div class="col-sm-5">
                        <input name="category_image" class="form-control" type="file" id="product_image">
                        @if ($errors->has('category_image'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('category_image') }}
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="category_icon" class="col-sm-3 control-label">Category Icon Class</label>

                    <div class="col-sm-5">
                        {!! Form::text('category_icon', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('category_icon'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('category_icon') }}
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="category_caption" class="col-sm-3 control-label">Caption</label>

                    <div class="col-sm-5">
                        {!! Form::textarea('category_caption', null, [ 'rows'=> '3', 'class' => 'form-control']) !!}                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_weight" class="col-sm-3 control-label">Category Weight</label>

                    <div class="col-sm-3">
                        {!! Form::number('category_weight', null, ['class' => 'form-control' ]) !!}
                        @if ($errors->has('category_weight'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('category_weight') }}
                        </span>
                        @endif
                    </div>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">                    
                <div class="form-group">                    
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-lg">{{$process}} Category</button>
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
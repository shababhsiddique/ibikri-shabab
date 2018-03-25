@extends('admin.master')
@section('adminContent')

<div class="row">    
    <!-- left column -->
    <div class="col-md-9">
        <!-- general form elements -->
        <div class="box box-primary">
            
            @if(isset($oldCategoryData))
            {!! Form::model($oldCategoryData,['class' => 'form-horizontal' , 'url' => 'admin/subcategory/save-subcategory','method' => 'post']) !!}
            <input type="hidden" name="subcategory_id" value="{{$oldCategoryData->subcategory_id}}" />            
            <?php $process = "Update"; ?>
            @else
            {!! Form::open(['class' => 'form-horizontal' , 'url' => 'admin/subcategory/save-subcategory','method' => 'post']) !!}
            <?php $process = "Create"; ?>
            @endif
            
            
            <div class="box-header with-border">
                <h3>{{$process}} Sub Category</h3>
            </div>
            <!-- /.box-header -->

                  
            


            <div class="box-body">


                <div class="form-group">
                    <label for="parent_category_id" class="col-sm-3 control-label">Parent Category</label>
                    <div class="col-sm-9">
                        <?php
                        $categories = App\Models\Category::all(); //lists('category_title_en', 'category_id');
                        $category = array();
                        foreach ($categories as $cat) {
                            $category[$cat->category_id] = $cat->category_title_en . "($cat->category_title_bn)";
                        }
                        ?>
                        {!! Form::select('parent_category_id',$category, null, ['class' => 'form-control select2'] ) !!}                        
                        @if ($errors->has('parent_category_id'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('parent_category_id') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="subcategory_title_en" class="col-sm-3 control-label">Sub Category Name (English)</label>
                    <div class="col-sm-9">
                        {!! Form::text('subcategory_title_en', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('subcategory_title_en'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('subcategory_title_en') }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="subcategory_title_bn" class="col-sm-3 control-label">Sub Category Name (Bengali)</label>

                    <div class="col-sm-9">
                        {!! Form::text('subcategory_title_bn', null, ['class' => 'form-control']) !!}                        
                        @if ($errors->has('subcategory_title_bn'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('subcategory_title_bn') }}
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <label for="subcategory_caption" class="col-sm-3 control-label">Caption</label>

                    <div class="col-sm-5">
                        {!! Form::textarea('subcategory_caption', null, [ 'rows'=> '3', 'class' => 'form-control']) !!}                        
                    </div>
                </div>

                <div class="form-group">
                    <label for="subcategory_weight" class="col-sm-3 control-label">Sub Category Weight</label>

                    <div class="col-sm-3">
                        {!! Form::number('subcategory_weight', 0, ['class' => 'form-control' ]) !!}
                        @if ($errors->has('subcategory_weight'))
                        <span class="text-danger">
                            <i class="fa fa-warning"></i> {{ $errors->first('subcategory_weight') }}
                        </span>
                        @endif
                    </div>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">                    
                <div class="form-group">                    
                    <div class="col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-success btn-lg">{{$process}} SubCategory</button>
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
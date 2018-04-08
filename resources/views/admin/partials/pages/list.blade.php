@extends('admin.master')
@section('adminContent')
<link rel="stylesheet" href="{{asset('site-assets/css/icofont/css/icofont.css')}}">

<div class="row">    
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Pages</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>                
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Page URL key</th>
                                    <th>Page Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $aPage)                            
                                <tr>
                                    <td>{{$aPage->page_id}}</td>
                                    <td>{{$aPage->page_slug}}</td>
                                    <td>{{$aPage->page_title_en}}</td>
                                    <td>
                                        <a class="btn btn-success btn-xs" target="__blank" href="{{url('help/'.$aPage->page_slug)}}"><i class="fa fa-eye"></i></a>                                        
                                        <a class="btn btn-primary btn-xs" href="{{url('admin/page/edit/'.$aPage->page_id)}}"><i class="fa fa-pencil"></i></a>                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>            
        </div>
        <!-- /.box -->    
    </div>    
</div>
<!-- /.row -->

@endsection
@extends('admin.master')
@section('adminContent')


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bordered Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover datatable">    
                    <thead>
                        <tr>
                            <th>post_id</th>
                            <th>User Name</th>
                            <th>Location</th>
                            <th>Under Category</th>
                            <th>Ad Title</th>
                            <th>Short Description</th></th>
                            <th>Status</th>
                            <th>Posted</th>
                            <th style="min-width: 80px"></th>
                        </tr>
                    </thead>
                </table>
            </div>            
        </div>
        <!-- /.box -->
    </div>    
</div>

<!--<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>-->
<script type="text/javascript">
    var oTable;
    $(document).ready(function () {
        oTable = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("datatable/getdata") }}',
            columns: [
                {data: 'post_id', name: 'posts.post_id'},
                {data: 'name', name: 'users.name'},
                {data: 'city_title_en', name: 'cities.city_title_en'},
                {data: 'subcategory_title_en', name: 'subcategories.subcategory_title_en'},
                {data: 'ad_title', name: 'posts.ad_title'},
                {data: 'short_description', name: 'posts.short_description'},
                {data: 'status', name: 'status', orderable: false},
                {data: 'created_at', name: 'posts.created_at'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
    });

    $(document).on("click", ".dtbutton", function () {
        $.get($(this).data('href'), function (data) {
            oTable.ajax.reload();
        });        
    });
</script>

@endsection
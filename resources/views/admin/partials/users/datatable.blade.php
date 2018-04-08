@extends('admin.master')
@section('adminContent')


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover datatable">    
                    <thead>
                        <tr>
                            <th>ID#</th>
                            <th>User Name</th>
                            <th>Mobile Number</th>
                            <th>Account Status</th>
                            <th>Ads Posted</th>
                            <th>City</th>
                            <th>Member Since</th>
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
            ajax: '{{ route("datatables/usersgetdata") }}',
            columns: [
                {data: 'id', name: 'users.id'},
                {data: 'name', name: 'users.name'},
                {data: 'mobile', name: 'users.mobile'},
                {data: 'account_status', name: 'users.account_status', orderable: false, searchable: false},
                {data: 'post_count', name: 'post_count', orderable: false, searchable: false},
                {data: 'city_title_en', name: 'cities.city_title_en'},
                {data: 'created_at', name: 'users.created_at'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
    });

    $(document).on("click", ".dtbutton", function () {
        $.get($(this).data('href'), function (data) {
            oTable.ajax.reload(null, false);
        });        
    });
</script>

@endsection
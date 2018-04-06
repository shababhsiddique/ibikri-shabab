@extends('admin.master')
@section('adminContent')


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">User Reports</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover datatable">    
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Post Title</th>
                            <th>Reason</th>
                            <th>Message</th>
                            <th>Post Status</th>
                            <th>Reported</th>
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
            ajax: '{{ route("datatable/getreportdata") }}',
            columns: [
                {data: 'report_id', name: 'reports.report_id'},
                {data: 'name', name: 'users.name'},
                {data: 'ad_title', name: 'posts.ad_title'},
                {data: 'reason', name: 'reports.reason'},
                {data: 'message', name: 'reports.message'},
                {data: 'status', name: 'posts.status'},
                {data: 'created_at', name: 'reports.created_at'},
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
    });

    $(document).on("click", ".dtbutton", function () {
        if ($(this).attr('id') === 'external') {
            window.open($(this).data('href'));
        } else {
            $.get($(this).data('href'), function (data) {
                oTable.ajax.reload(null, false);
            });

        }
    });
</script>

@endsection
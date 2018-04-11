@extends('admin.master')
@section('adminContent')


<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">User Payments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-hover datatable">    
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Amount</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Date</th>
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
            ajax: '{{ route("datatables/rechargegetdata") }}',
            columns: [
                {data: 'recharge_request_id', name: 'recharge_request_id'},
                {data: 'name', name: 'users.name'},
                {data: 'recharge_amount', name: 'recharge_amount'},
                {data: 'bkash_code', name: 'bkash_code'},
                {data: 'request_status', name: 'request_status'},
                {data: 'created_at', name: 'created_at'},
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
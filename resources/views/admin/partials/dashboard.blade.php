@extends('admin.master')

@section('adminContent')

<div class="row">
    <div class="col-md-3 col-xs-12">
        <!-- small box -->
        <a href="{{url('admin/ads')}}" class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo \App\Models\Post::all()->count() ?></h3>
                <p>Total Ads</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <span class="small-box-footer">View Ads&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
        </a>
    </div>
    <!-- ./col -->
    <div class="col-md-3 col-xs-12">
        <!-- small box -->
        <a href="{{url('admin/payments')}}"  class="small-box bg-green">
            <div class="inner">
                <h3><?php
                    echo \App\Models\RechargeRequest::where('request_status', 1)->get()->count();
                    ?><sup style="font-size: 20px"></sup></h3>

                <p>Pending Payments</p>
            </div>
            <div class="icon">
                <i class="fa fa-dollar"></i>
            </div>
            <span class="small-box-footer">Confirm Payment Requests&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
        </a>
    </div>
    <!-- ./col -->
    <div class="col-md-3 col-xs-12">
        <!-- small box -->
        <a href="{{url('admin/users')}}"  class="small-box bg-yellow">
            <div class="inner">
                <h3><?php
                    echo \App\User::all()->count();
                    ?></h3>

                <p>Users</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <span class="small-box-footer">Manage Users&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
        </a>
    </div>
    <div class="col-md-3 col-xs-12">
        <!-- small box -->
        <a href="{{url('admin/ad/complains')}}"  class="small-box bg-red">
            <div class="inner">
                <h3><?php
                    echo \App\Models\Report::where('report_status', 0)->get()->count();
                    ?></h3>

                <p>Open Complains</p>
            </div>
            <div class="icon">
                <i class="ion ion-alert-circled"></i>
            </div>
            <span class="small-box-footer">View Complains&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
        </a>
    </div>
    <!-- ./col -->

</div>



<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Monthly Recap Report</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                    <div class="col-md-12">
                        <p class="text-center">
                            <?php
                            $from = date("01 F, Y", strtotime("-5 month"));
                            $to = date("t F, Y", time());
                            ?>
                            <strong>Posts : {{$from}} - {{$to}}</strong>
                        </p>


                        <div class="chart">
                            <!-- Sales Chart Canvas -->
                            <canvas id="salesChart" style="height: 180px;"></canvas>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
                <div class="row">
                    <!--                    <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                                <h5 class="description-header"></h5>
                                                <span class="description-text">TOTAL REVENUE</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                                <h5 class="description-header"></h5>
                                                <span class="description-text">TOTAL COST</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block border-right">
                                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                                <h5 class="description-header"></h5>
                                                <span class="description-text">TOTAL PROFIT</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-xs-6">
                                            <div class="description-block">
                                                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                                <h5 class="description-header">1200</h5>
                                                <span class="description-text">GOAL COMPLETIONS</span>
                                            </div>
                                        </div>-->
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<!-- Morris.js charts -->
<!--<script src="{{asset('assets/components/raphael/raphael.min.js')}}"></script>-->
<!--<script src="{{asset('assets/components/morris.js/morris.min.js')}}"></script>-->

<!--<script src="{{asset('assets/js/dashboardmorris.js')}}"></script>-->
<!--<script src="{{asset('assets/js/dashboardchart.js')}}"></script>-->
<?php
$monthNames = [];
$monthSales = [];
for ($i = 5; $i >= 0; $i--) {

    $monthNames[] = "'" . date("F", strtotime("-" . $i . " month")) . "'";


    $query_date = date("Y-m-d", strtotime("-" . $i . " month"));
    // First day of the month.
    $startDate = date('Y-m-01', strtotime($query_date));
    // Last day of the month.
    $endDate = date('Y-m-t', strtotime($query_date));

    $monthSales[] = App\Models\Post::countPostsByMonth($startDate, $endDate);
    echo "<br/>";
}

$lastSixMonths = implode(",", $monthNames); //"'January', 'February', 'March', 'April', 'May', 'June', 'July', 'Auguest', 'September', 'October', 'November', 'December'";
$lastSixMonthSaleValues = implode(",", $monthSales); //"28, 48, 40, 45, 86, 60, 50, 55, 50, 40, 35, 60";
getUiUpdate(url('/'));
?>
<script type="text/javascript">
    $(function () {
        

        'use strict';

        // -----------------------
        // - MONTHLY SALES CHART -
        // -----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: [
<?php echo $lastSixMonths ?>
            ],
            datasets: [
                {
                    label: 'Sales',
                    fillColor: '#40b982',
                    strokeColor: '#00a65a',
                    pointColor: '#008D4D',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo $lastSixMonthSaleValues ?>]
                }
            ]
        };

        var salesChartOptions = {
            // Boolean - If we should show the scale at all
            showScale: true,
            // Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            // String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            // Number - Width of the grid lines
            scaleGridLineWidth: 1,
            // Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            // Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            // Boolean - Whether the line is curved between points
            bezierCurve: false,
            // Number - Tension of the bezier curve between points
//    bezierCurveTension      : 0.3,
            // Boolean - Whether to show a dot for each point
            pointDot: true,
            // Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            // Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 1,
            // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            // Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            // Number - Pixel width of dataset stroke
            datasetStrokeWidth: 2,
            // Boolean - Whether to fill the dataset with a color
            datasetFill: false,
            // String - A legend template
            legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: true,
            // Boolean - whether to make the chart responsive to window resizing
            responsive: false
        };

        // Create the line chart
        salesChart.Line(salesChartData, salesChartOptions);

        // ---------------------------
        // - END MONTHLY SALES CHART -
        // ---------------------------

    });
    
</script>

<?php ?>

@endsection
@extends('admin.master')

@section('adminContent')

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="#test" class="small-box bg-aqua">
            <div class="inner">
                <h3>--</h3>
                <p>Total Sales</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <span class="small-box-footer">View Sales&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
        </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="{{url('/products')}}"  class="small-box bg-green">
            <div class="inner">
                <h3>100<sup style="font-size: 20px"></sup></h3>

                <p>Total Products</p>
            </div>
            <div class="icon">
                <i class="fa fa-square-o"></i>
            </div>
            <span class="small-box-footer">Products&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
        </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="{{url('/customers')}}"  class="small-box bg-yellow">
            <div class="inner">
                <h3>50</h3>

                <p>Total Clients</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-stalker"></i>
            </div>
            <span class="small-box-footer">Customers&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
        </a>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="#test"  class="small-box bg-red">
            <div class="inner">
                <h3>--</h3>

                <p>Recievings</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <span class="small-box-footer">Reports&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></span>
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
                    <div class="btn-group">
                        <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-wrench"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                    <div class="col-md-4">
                        <p class="text-center">
                            <strong>Sale Amounts</strong>
                        </p>

                        <div class="progress-group">
                            <span class="progress-text">Today</span>
                            <span class="progress-number"><b>2000</b></span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Last 7 Days</span>
                            <span class="progress-number"><b>18000</b>/20000</span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Last 30 Days</span>
                            <span class="progress-number"><b>50000</b>/100000</span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-green" style="width: 50%"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                        <div class="progress-group">
                            <span class="progress-text">Send Inquiries</span>
                            <span class="progress-number"><b>250</b>/500</span>

                            <div class="progress sm">
                                <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                            </div>
                        </div>
                        <!-- /.progress-group -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-8">
                        <p class="text-center">
                            <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
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
                    <div class="col-sm-3 col-xs-6">
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
                    </div>
                </div>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->


<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">

        <a href="#sale" class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-ios-cart"></i></span>

            <div class="info-box-content">
                <h2><strong>New Sale <i class="fa fa-plus-circle"></i></strong></h2>
            </div>
            <!-- /.info-box-content -->
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{url('/product-create')}}" class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-archive"></i></span>

            <div class="info-box-content">
                <h2><strong>New Product <i class="fa fa-plus-circle"></i></strong></h2>
            </div>
            <!-- /.info-box-content -->
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{url('/customer-create')}}" class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-person"></i></span>

            <div class="info-box-content">
                <h2><strong>New Client <i class="fa fa-plus-circle"></i></strong></h2>
            </div>
            <!-- /.info-box-content -->
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#report" class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-paper"></i></span>

            <div class="info-box-content">
                <h2><strong>View Reports</strong></h2>
            </div>
            <!-- /.info-box-content -->
        </a>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

</div>
<!-- /.row -->

<!-- Morris.js charts -->
<!--<script src="{{asset('assets/components/raphael/raphael.min.js')}}"></script>-->
<!--<script src="{{asset('assets/components/morris.js/morris.min.js')}}"></script>-->

<!--<script src="{{asset('assets/js/dashboardmorris.js')}}"></script>-->
<script src="{{asset('assets/js/dashboardchart.js')}}"></script>

@endsection
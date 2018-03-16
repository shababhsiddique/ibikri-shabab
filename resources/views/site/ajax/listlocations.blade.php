<div class="container-fluid">                            
    <div class="row">
        <div class="col-md-6">
            <h3>Locations</h3>
            <div class="list-group">
                <a class="list-group-item" data-toggle="tab" href="#category1"><i class="icofont icofont-building-alt"></i> &nbsp;&nbsp;Dhaka<i class="fa fa-chevron-right pull-right"></i></a>
                <a class="list-group-item" data-toggle="tab" href="#category2"><i class="icofont icofont-hill-side"></i> &nbsp;&nbsp;Chittagong<i class="fa fa-chevron-right pull-right"></i></a>
                <a class="list-group-item" data-toggle="tab" href="#category3"><i class="icofont icofont-farmer"></i> &nbsp;&nbsp;Rajshahi<i class="fa fa-chevron-right pull-right"></i></a>
                <a class="list-group-item" data-toggle="tab" href="#category4"><i class="icofont icofont-tea"></i> &nbsp;&nbsp;Sylhet<i class="fa fa-chevron-right pull-right"></i></a>
                <a class="list-group-item" data-toggle="tab" href="#category5"><i class="icofont icofont-island-alt"></i> &nbsp;&nbsp;Barisal<i class="fa fa-chevron-right pull-right"></i></a>
                <a class="list-group-item" data-toggle="tab" href="#category6"><i class="icofont icofont-ship-alt"></i> &nbsp;&nbsp;Khulna<i class="fa fa-chevron-right pull-right"></i></a>
            </div>                                    
        </div>
        <div class="col-md-6 tab-content location-stage2">
            <h3>Sub Locations</h3>
            <div class="list-group tab-pane" id="category1">
                @for($i = 1; $i < 10 ;$i++)
                <a class="list-group-item" href="#f" data-id='{{$i}}' data-text='NameCity{{$i}}'>NameCity{{$i}} <span class="fa fa-chevron-right pull-right"></span></a>
                @endfor
            </div>
            <div class="list-group tab-pane" id="category2">
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
            </div>
            <div class="list-group tab-pane" id="category3">
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
                <a class="list-group-item" href="#f">Cras justo odio <span class="fa fa-chevron-right pull-right"></span></a>
            </div>
        </div>
    </div>                            
</div>
<script type="text/javascript">
    $("div.location-stage2 .list-group-item").click(function () {
        var selVal = $(this).data("id");
        var selText = $(this).data("text");
        $("#location-selector-value").val(selVal);
        $("#location-selector-text").html(selText);
        $('#popupSelectModal').modal("hide");
    });
</script>
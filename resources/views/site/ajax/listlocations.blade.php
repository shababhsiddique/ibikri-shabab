<div class="container-fluid">                            
    <div class="row">
        <div class="col-md-6">
            <h3>@lang('Divisions')</h3>
            <div class="list-group">
                <?php
                $column = __('division_title_en');
                $divisions = DB::table('divisions')->orderBy('division_weight')->get();
                ?>
                @foreach($divisions as $aDiv)
                <a class="list-group-item" data-toggle="tab" href="#division{{$aDiv->division_id}}"><i class="{{$aDiv->division_icon}}"></i> &nbsp;&nbsp;<?php echo $aDiv->$column ?><i class="fa fa-chevron-right pull-right"></i></a>
                @endforeach
            </div>                                                 
        </div>
        <div class="col-md-6 tab-content location-stage2">
            <h3>@lang('Districts')</h3>
            <?php
            $columnDistrict = __('city_title_en');
            foreach ($divisions as $aDiv) {
                $districts = DB::table('cities')
                        ->where('division_id', $aDiv->division_id)
                        ->get();

                echo '<div class="list-group tab-pane" id="division' . $aDiv->division_id . '">';
                foreach ($districts as $aDistrict) {
                    ?>
                    <a data-text="<?php echo $aDistrict->$columnDistrict ?>" data-id="<?php echo $aDistrict->city_id ?>" class="list-group-item" data-href="<?php echo url("all-ads/0/$aDistrict->city_id") ?>"><?php echo $aDistrict->$columnDistrict ?><span class="fa fa-chevron-right pull-right"></span></a>
                        <?php
                    }
                    echo '</div>';
                }
                ?>            
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
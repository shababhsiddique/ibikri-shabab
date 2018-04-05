<div class="container-fluid">                            
    <div class="row">
        <div class="col-md-6">
            <h3>@lang('Categories')</h3>
            <div class="list-group">
                <?php
                $column = __('category_title_en');
                $categories = Cache::rememberForever('categories', function() {
                            return DB::table('categories')->get();
                        });
                ?>
                @foreach($categories as $aCat)
                <a class="list-group-item" data-toggle="tab" href="#category{{$aCat->category_id}}"><i class="{{$aCat->category_icon}}"></i> &nbsp;&nbsp;<?php echo $aCat->$column ?><i class="fa fa-chevron-right pull-right"></i></a>
                @endforeach
            </div>                                    
        </div>
        <div class="col-md-6 tab-content category-stage2">
            <h3>@lang('Sub Categories')</h3>
            <?php
            $columnSubcat = __('subcategory_title_en');
            foreach ($categories as $aCat) {

                //Cache sub categories of this category
                $subCategories = Cache::rememberForever("cat-$aCat->category_id-subcats", function() use ($aCat) {
                            return DB::table('subcategories')
                                            ->where('parent_category_id', $aCat->category_id)
                                            ->get();
                        });

                echo '<div class="list-group tab-pane" id="category' . $aCat->category_id . '">';
                foreach ($subCategories as $aSubCat) {
                    ?>
                    <a class="list-group-item" 
                       data-id="{{$aSubCat->subcategory_id}}" 
                       data-text="<?php echo $aSubCat->$columnSubcat ?>" 

                       data-parent-id="<?php echo $aCat->category_id ?>" 
                       data-parent-text="<?php echo $aCat->$column ?>" 

                       data-image="{{asset($aCat->category_image)}}" 
                       data-href="<?php echo url("all-ads/$aSubCat->subcategory_id/0") ?>"><?php echo $aSubCat->$columnSubcat ?><span class="fa fa-chevron-right pull-right"></span></a>
                        <?php
                    }
                    echo '</div>';
                }
                ?>            
        </div>
    </div>                            
</div>
<script type="text/javascript">
    $("div.category-stage2 .list-group-item").click(function () {
        var selVal = $(this).data("id");
        var selText = $(this).data("text");

        var selParentText = $(this).data("parent-text");
        var selParentValue = $(this).data("parent-id");

        var selImage = $(this).data("image");

        $("#category-selector-value").val(selVal);
        $("#category-selector-text").html(selText);

        $("#category-selector-parent-value").val(selParentValue);
        $("#category-selector-parent-text").html(selParentText);

        $("#category-selector-image").attr('src', selImage);
        $('#popupSelectModal').modal("hide");
    });
</script>
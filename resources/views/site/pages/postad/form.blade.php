@extends('site.master')
@section('siteContent')
<!-- ad post form -->
<section id="main" class="clearfix ad-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="index.html">@lang('Home')</a></li>
                <li>@lang('Ad Post')</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">@lang('Post Your Ad')</h2>
        </div><!-- banner -->

        <div class="adpost-details">
            <div class="row">	
                <div class="col-md-8">    
                    @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif

                    <fieldset>
                        <div class="section postdetails">
                            <h4>@lang('Sell an item or service') <span class="pull-right">* @lang('Mandatory Fields')</span></h4>

                            <div class="row form-group">
                                <label class="col-sm-3 label-title">@lang('Category')</label>
                                <div class="col-sm-9">                                                                        
                                    <a class="btn btn-select" data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#">
                                        <img id="category-selector-image" src='{{asset("images/category/gift_item.png")}}' alt="Images">
                                        <span id="category-selector-parent-text">@lang('Please Select')</span>
                                        <span>&nbsp;&nbsp; &gt; &nbsp;&nbsp;</span> 
                                        <span id='category-selector-text' class="change-text">Select Category</span> 
                                        <i class="fa fa-angle-down pull-right"></i>
                                    </a>                                       
                                    {!! Form::hidden('subcategory_id', null , ['form'=>'new-post-form','id' => 'category-selector-value']) !!}                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3 label-title">@lang('Location')</label>
                                <div class="col-sm-9">                                                                        
                                    <a class="btn btn-select" data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/locations')}}" href="#">
                                        <span id='location-selector-text' class="change-text"><?php
                                        $columnCity = __('city_title_en');
                                        echo $userData->city->$columnCity;
                                        ?></span> 
                                        <i class="fa fa-angle-down pull-right"></i>
                                    </a>                                       
                                    {!! Form::hidden('city_id', null , ['form'=>'new-post-form','id' => 'location-selector-value']) !!}
                                    @include('site.common.categorymodal')
                                </div>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3">@lang('Type of ad')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="radio" name="ad_type" form="new-post-form" value="newsell" id="newsell"> <label for="newsell">@lang('I want to sell')</label>
                                    <input type="radio" name="ad_type" form="new-post-form" value="newbuy" id="newbuy"> <label for="newbuy">@lang('I want to buy')</label>	                                    
                                    @if ($errors->has('ad_type'))
                                    <br/>
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> {{ $errors->first('ad_type') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group add-title">
                                <label class="col-sm-3 label-title">@lang('Title for your Ad')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::text('ad_title', null , ['form'=>'new-post-form','class' => 'form-control', 'autofocus' => 'true' ,  "placeholder" => "ex: Sony Xperia dual sim 100% brand new" ]) !!}
                                    @if ($errors->has('ad_title'))
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> {{ $errors->first('ad_title') }}
                                    </span>
                                    @endif                                    
                                </div>
                            </div>
                            <div class="row form-group add-image">
                                <label class="col-sm-3 label-title">@lang('Photos for your ad') <span class="required">*</span><span>(@lang('This will be your cover photo'))</span> </label>
                                <div class="col-sm-9">                                                                        
                                    {!! Form::open(['url' => 'upload','id'=>'dropzoneinst', 'class'=>'dropzone', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}                                    
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>                                    
                                    {!! Form::close() !!}  
                                    <button id="uploadopenbtn" type="button" class="btn btn-default">Select files for upload.. (max 4)</button>
                                    @if ($errors->has('imagenames'))
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> Please upload atleast 1 image
                                    </span>
                                    @endif
                                </div>                                
                            </div>

                            <div class="row form-group select-condition">
                                <label class="col-sm-3">@lang('Condition')<span class="required">*</span></label>
                                <div class="col-sm-9">                        
                                    <input type="radio" form="new-post-form" name="item_condition" value="New" id="new"> 
                                    <label for="new">@lang('New')</label>
                                    <input type="radio" form="new-post-form" name="item_condition" value="Used" id="used"> 
                                    <label for="used">@lang('Used')</label>
                                    @if ($errors->has('item_condition'))
                                    <br/>
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> {{ $errors->first('item_condition') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row form-group select-price">
                                <label class="col-sm-3 label-title">@lang('Price')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <label>@lang('BDT')</label>
                                    {!! Form::text('item_price', null , ['form'=>'new-post-form','class' => 'form-control' ]) !!}
                                    @if ($errors->has('item_price'))
                                    <br/>
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> {{ $errors->first('item_price') }}
                                    </span>
                                    @endif
                                    <div class="checkbox">
                                        <label for="negotiable"><input type="checkbox" form="new-post-form" name="negotiable" value="1" id="negotiable"> @lang('Negotiable')</label>                                    
                                    </div>                                    
                                </div>
                            </div>                            

                            <div class="row form-group model-name">
                                <label class="col-sm-3 label-title">@lang('Model')<span class="required">*</span></label>
                                <div class="col-sm-9">                                    
                                    {!! Form::text('model', null , ['form'=>'new-post-form', 'class' => 'form-control' ]) !!}
                                    @if ($errors->has('model'))
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> {{ $errors->first('model') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group item-description">
                                <label class="col-sm-3 label-title">@lang('Short Description')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('short_description', null , ['form'=>'new-post-form', 'class' => 'form-control',"id"=>"short_description", "rows"=>"3" ]) !!}                                    
                                    @if ($errors->has('short_description'))
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> {{ $errors->first('short_description') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row form-group item-description">
                                <label class="col-sm-3 label-title">@lang('Description')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::textarea('long_description', null , ['form'=>'new-post-form', 'class' => 'form-control', "id"=>"long_description", "rows"=>"8" ]) !!}
                                    @if ($errors->has('long_description'))
                                    <span class="text-danger">
                                        <i class="fa fa-warning"></i> {{ $errors->first('long_description') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <p><span id="desc_char_left">5000</span>@lang(' characters left')</p>
                                </div>
                            </div>								
                        </div>
                        <!-- section -->

                        <div class="section seller-info">
                            <h4>Seller Information</h4>
                            <div class="row form-group">
                                <label class="col-sm-3 label-title">@lang('Your Name')</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" readonly="" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>    
                            <div class="row form-group">
                                <label class="col-sm-3 label-title">@lang('Mobile Number')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    {!! Form::text('contact_phone', $userData->mobile , ['form'=>'new-post-form', 'class' => 'form-control' ]) !!}                                    
                                </div>
                            </div>                            
                        </div><!-- section -->

                        <!--include inline register-->

                        <!--include make your ad premium-->
                        {!! Form::open(['class' => 'new-post-form','id' => 'new-post-form', 'url' => 'post-ad/submit','method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                        {!! Form::hidden('imagenames', null , ['id' => 'imagenames', 'form'=>'new-post-form', 'class' => 'form-control' ]) !!}
                        <!--<input type="text" id="imagenames" name="imagenames" value="[]" form="new-post-form" style="width: 100%"/>-->
                        <div class="checkbox section agreement">
                            <label for="confirm">
                                <input type="checkbox" name="send" id="confirm">
                                @lang('By clicking "Post", you agree to our ')<a href="#">Terms of Use</a> @lang('and') <a href="#">Privacy Policy</a> @lang('and acknowledge that you are the rightful owner of this item and using iBikri to find a genuine buyer.')
                                <span id="confirm-err" class="text-danger"></span>
                            </label>
                            <button type="submit" onclick="return verifyTick()" class="btn btn-primary">@lang('Post Your Ad')</button>
                        </div><!-- section -->
                        {!! Form::close() !!}
                    </fieldset>



                </div>


                <!-- quick-rules -->	
                <div class="col-md-4">
                    <div class="section quick-rules">
                        <h4>@lang('Quick rules')</h4>
                        <p class="lead">@lang('Posting an ad on ')<a href="#">iBikri.com</a>@lang(' is free! However, all ads must follow our rules'):</p>

                        <ul>
                            <li>@lang('Make sure you post in the correct category.')</li>
                            <li>@lang('Do not post the same ad more than once or repost an ad within 48 hours.')</li>
                            <li>@lang('Do not upload pictures with watermarks.')</li>
                            <li>@lang('Do not post ads containing multiple items unless it is a package deal.')</li>
                            <li>@lang('iBikri.com has the right to un unpulish your ad anytime')</li>
                            <li>@lang('Do not post images/text with profanity or hurtful content, doing so will result in account ban')</li>
                        </ul>
                    </div>
                </div><!-- quick-rules -->	               

            </div><!-- photos-ad -->				
        </div>	        

    </div><!-- container -->
</section><!-- main -->

@include('site.common.categorymodal')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('site-assets/plugins/dropzone/dropzone.css')}}"/>
@endpush                               
@push('scripts')
<!-- Dropzone -->
<script src="{{asset('site-assets/plugins/dropzone/dropzone.js')}}"></script>
<script type="text/javascript">
                                var fileServerNames = new Array;
                                var thisDropzone;
                                $(document).ready(function () {
                                    Dropzone.autoDiscover = false;

                                    /* Initiade dropzone */
                                    $("#dropzoneinst").dropzone({
                                        paramName: "file",
                                        maxFiles: 4,
                                        parallelUploads: 4,
                                        acceptedFiles: 'image/png,image/jpg,image/jpeg',
                                        url: "<?php echo url('upload') ?>",
                                        addRemoveLinks: true,
                                        createImageThumbnails: true,
                                        thumbnailWidth: 120,
                                        thumbnailHeight: 120,
                                        autoProcessQueue: false,
                                        init: function () {
                                            thisDropzone = this;
                                            this.on("removedfile", function (file) {
                                                console.log("test");
                                                console.log(file);
                                                $.post("<?php echo url('upload-delete') ?>", {_token: '{{ csrf_token() }}', filename: file.name, uploadname: fileServerNames[file.name]}, function () {
                                                    var fileServerNames = JSON.parse($("#imagenames").val());
                                                    delete fileServerNames[file.name];
                                                    $("#imagenames").val(JSON.stringify(fileServerNames));
                                                });
                                            });
                                        },
                                        success: function (file, response) {
                                            var obj = JSON.parse(response);
                                            var imgName = Object.keys(obj)[0]
                                            var imgUploadName = obj[Object.keys(obj)[0]];

                                            file.previewElement.classList.add("dz-success");
                                            console.log("Successfully uploaded :" + imgName + " as " + imgUploadName);

                                            fileServerNames = $.extend({}, fileServerNames, obj);
                                            $("#imagenames").val(JSON.stringify(fileServerNames));

                                        },
                                        error: function (file, response) {
                                            file.previewElement.classList.add("dz-error");
                                            $(file.previewElement).find('.dz-error-message').html("File not allowed, or too large");
                                            console.log("error occured");
                                        }
                                    });

                                    /*Create thumbnail and process upload after 1s*/
                                    thisDropzone.on('thumbnail', function (file, thumb) {
                                        file.thumbnail = thumb;
//                                            thisDropzone.processQueue();
                                        setTimeout(function () {
                                            if (thisDropzone.getQueuedFiles().length > 0) {
                                                thisDropzone.processQueue();
                                            }
                                        }, 1000);
                                        console.log("thumb created");
                                    });

                                    /*when sending upload data to server, send thumbnail with it*/
                                    thisDropzone.on('sending', function (file, xhr, formData) {
                                        formData.append('thumbnail', file.thumbnail);
                                        console.log("thumb Appended");
                                    });

                                    /* Fake button to trigger file upload dialog */
                                    $("#uploadopenbtn").on("click", function () {
                                        $("#dropzoneinst").click();
                                    });

<?php
if (old('imagenames')) {
    $images = json_decode(old('imagenames'));
    $folder = Session::get('post-image-cache');

    $indx = 0;
    foreach ($images as $orig => $filename) {
        $indx = $indx + 1;
        $tempPath = asset("images/temp/$folder/thumb_$filename");
        ?>
                                            // Create the mock file:
                                            var mockFile = {name: "<?php echo $orig ?>", size: 12345};

                                            // Call the default addedfile event handler
                                            thisDropzone.emit("addedfile", mockFile);

                                            // callback and crossOrigin are optional.
                                            thisDropzone.createThumbnailFromUrl(mockFile, '<?php echo $tempPath ?>');

                                            // Make sure that there is no progress bar, etc...
                                            thisDropzone.emit("complete", mockFile);

                                            // And optionally show the thumbnail of the file:
                                            thisDropzone.emit("thumbnail", mockFile, "<?php echo $tempPath ?>");

                                            fileServerNames['<?php echo $orig ?>'] = "<?php echo $filename ?>";
        <?php
    }
}
?>


                                });
                                Array.prototype.remove = function () {
                                    var what, a = arguments, L = a.length, ax;
                                    while (L && this.length) {
                                        what = a[--L];
                                        while ((ax = this.indexOf(what)) !== -1) {
                                            this.splice(ax, 1);
                                        }
                                    }
                                    return this;
                                };
</script>
@endpush

@endsection
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
                    {!! Form::open(['class' => 'new-post-form', 'url' => 'post-ad/save','method' => 'post']) !!}
                    <fieldset>
                        <div class="section postdetails">
                            <h4>@lang('Sell an item or service') <span class="pull-right">* @lang('Mandatory Fields')</span></h4>
                            <div class="form-group selected-product">
                                {!! Form::hidden('subcategory_id', null, ['id' => 'category-selector-value']) !!}
                                <ul class="select-category list-inline">
                                    <li>
                                        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#">
                                            <span class="select" >
                                                <img id="category-selector-image" src='{{asset("images/category/gift_item.png")}}' alt="Images" class="img-responsive">
                                            </span>
                                            <span id="category-selector-parent">@lang('Please Select')</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#" id="category-selector-text"> @lang('Please Select Category') </a>
                                    </li>
                                </ul>
                                <a class="edit" data-toggle="modal" data-target="#popupSelectModal" data-href="{{url('ajax/categories')}}" href="#" id="category-selector-text"><i class="fa fa-pencil"></i>@lang('Edit')</a>
                            </div>
                            <div class="row form-group">
                                <label class="col-sm-3">@lang('Type of ad')<span class="required">*</span></label>
                                <div class="col-sm-9 user-type">
                                    <input type="radio" name="sellType" value="newsell" id="newsell"> <label for="newsell">@lang('I want to sell')</label>
                                    <input type="radio" name="sellType" value="newbuy" id="newbuy"> <label for="newbuy">@lang('I want to buy')</label>	
                                </div>
                            </div>
                            <div class="row form-group add-title">
                                <label class="col-sm-3 label-title">@lang('Title for your Ad')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="text" placeholder="ex, Sony Xperia dual sim 100% brand new ">
                                </div>
                            </div>
                            <div class="row form-group add-image">
                                <label class="col-sm-3 label-title">@lang('Photos for your ad') <span>(@lang('This will be your cover photo'))</span> </label>
                                <div class="col-sm-9">
                                    <h5><i class="fa fa-upload" aria-hidden="true"></i>@lang('Select Files to Upload / Drag and Drop Files')<span>@lang('You can add multiple images.')</span></h5>
                                    <br>
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>@lang('Add files...')</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <!--<input id="fileupload" data-handler="{{url('/jqfuh.php')}}" data-removelink="{{url('ajax-remove-img')}}" type="file" name="files[]" multiple>-->
                                        <input id="fileupload" data-handler="{{url('/post-ad-image')}}" data-removelink="{{url('ajax-remove-img')}}" type="file"  name="files[]" accept="image/x-png,image/gif,image/jpeg" multiple>
                                    </span>
                                    <br>
                                    <br>
                                    <!-- The global progress bar -->
                                    <div id="progress" class="progress">
                                        <div class="progress-bar progress-bar-theme"></div>
                                    </div>
                                    <!-- The container for the uploaded files -->
                                    <div id="files" class="files image-thumbnails-holder"></div>                                    
                                </div>
                                @push('styles')
                                <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
                                <link rel="stylesheet" href="{{asset('site-assets/plugins/jqfile/css/jquery.fileupload.css')}}">
                                @endpush
                                @push('scripts')
                                <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                                <script src="{{asset('site-assets/plugins/jqfile/js/vendor/jquery.ui.widget.js')}}"></script>
                                <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                                <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
                                <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                                <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
                                <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                                <script src="{{asset('site-assets/plugins/jqfile/js/jquery.iframe-transport.js')}}"></script>
                                <!-- The basic File Upload plugin -->
                                <script src="{{asset('site-assets/plugins/jqfile/js/jquery.fileupload.js')}}"></script>
                                <!-- The File Upload processing plugin -->
                                <script src="{{asset('site-assets/plugins/jqfile/js/jquery.fileupload-process.js')}}"></script>
                                <!-- The File Upload image preview & resize plugin -->
                                <script src="{{asset('site-assets/plugins/jqfile/js/jquery.fileupload-image.js')}}"></script>

                                <!-- The File Upload validation plugin -->
                                <script src="{{asset('site-assets/plugins/jqfile/js/jquery.fileupload-validate.js')}}"></script>
                                <!--custom--> 
                                <script src="{{asset('site-assets/plugins/jqfile/js/custom.js')}}"></script>
                                @endpush
                            </div>
                            <div class="row form-group select-condition">
                                <label class="col-sm-3">@lang('Condition')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="radio" name="itemCon" value="new" id="new"> 
                                    <label for="new">@lang('New')</label>
                                    <input type="radio" name="itemCon" value="used" id="used"> 
                                    <label for="used">@lang('Used')</label>
                                </div>
                            </div>
                            <div class="row form-group select-price">
                                <label class="col-sm-3 label-title">@lang('Price')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <label>@lang('BDT')</label>
                                    <input type="text" class="form-control" id="text1">
                                    <div class="checkbox">
                                        <label for="negotiable"><input type="checkbox" name="negotiable" value="negotiable" id="negotiable"> @lang('Negotiable')</label>                                    
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group brand-name">
                                <label class="col-sm-3 label-title">@lang('Brand Name')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" placeholder="ex, Sony Xperia">
                                </div>
                            </div>

                            <div class="row form-group model-name">
                                <label class="col-sm-3 label-title">@lang('Model')</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="model" placeholder="ex, Sony Xperia dual sim 100% brand new ">	
                                </div>
                            </div>

                            <div class="row form-group model-name">
                                <label class="col-sm-3 label-title">@lang('Additional')</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="model" placeholder="ex, Sony Xperia dual sim 100% brand new ">	
                                </div>
                            </div>

                            <div class="row form-group item-description">
                                <label class="col-sm-3 label-title">@lang('Description')<span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="textarea" placeholder="Write few lines about your products" rows="8"></textarea>		
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-3">
                                    <p><span id="desc_char_left">5000</span>@lang(' characters left')</p>
                                </div>
                            </div>								
                        </div><!-- section -->                        

                        <!--include inline register-->

                        <!--include make your ad premium-->

                        <div class="checkbox section agreement">
                            <label for="send">
                                <input type="checkbox" name="send" id="send">
                                @lang('By clicking "Post", you agree to our ')<a href="#">Terms of Use</a> @lang('and') <a href="#">Privacy Policy</a> @lang('and acknowledge that you are the rightful owner of this item and using iBikri to find a genuine buyer.')
                            </label>
                            <button type="submit" class="btn btn-primary">@lang('Post Your Ad')</button>
                        </div><!-- section -->

                    </fieldset>
                    {!! Form::close() !!}
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
@endsection

@if ($errors->any())
<script type="text/javascript">
    $(window).on('load',function(){
        $('#reportModal').modal('show');
    });
</script>
@endif
<div class="modal fade" id="reportModal">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body" id="modal-popup-body">
                <div class="row">
                    <div class="col-md-12">
                        @guest
                        <h3>@lang('You need to login to report')</h3>
                        <a class="btn btn-primary" href="{{url('login')}}">@lang('Login')</a>
                        @else
                        <h3>@lang('Report This Ad')</h3>
                        <p>We are trying our best bring you the best advertisements. If you have anything to say about this particular post please leave your comment. We are on it!</p>
                        {!! Form::open([ 'url' => 'report','method' => 'post']) !!}
                        <div class="form-group">
                            <label class="control-label">@lang('Your Name')</label>
                            {!! Form::hidden('post_id', $adDetails->post_id) !!}
                            {!! Form::hidden('user_id', Auth::user()->id) !!}
                            {!! Form::text('name', Auth::user()->name, ['class' => 'form-control','readonly'=>'true']) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">@lang('Reason')</label>                                
                            <?php
                            $reasons = array(
                                'sold' => __('Item is sold'),
                                'fake' => __('Fake Item'),
                                'duplicate' => __('Duplicate'),
                                'spam' => __('Spam'),
                                'wrong_category' => __('Wrong Category'),
                                'offensive' => __('Offensive'),
                                'other' => __('Other')
                            );
                            ?>
                            {{ Form::select('reason', $reasons,null, ['class' => 'form-control']) }}
                            @if ($errors->has('reason'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('reason') }}</strong>
                            </span>
                            @endif                          
                        </div>
                        <div class="form-group">
                            <label class="control-label">@lang('Explain Yourself')</label>
                            {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
                            @if ($errors->has('message'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>

                        {!! Form::close()!!}
                        @endguest 
                    </div>                   
                </div>
            </div>                    
        </div>
    </div>
</div>

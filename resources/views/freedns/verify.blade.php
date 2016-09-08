@extends('layouts.master')

@section('title', 'Free DNS | Configure DNS')

@section('header')
    <style type="text/css">
        input[type=radio]:focus {
            outline: none;
            border: none;
            box-shadow: none
        }
    </style>
@stop

@section('body')
    <section class="container">
        <div class="panel pane-default">
            <div class="panel-body">
                {{ Form::open(['route' => [ 'customer.freeDns.store', $freeDns->id ], 'class' => 'form-horizontal', 'role' => 'form', 'id' => 'free-dns-form']) }}
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="row">
                            <h2 class="text-center">Configure DNS</h2>
                            <div class="well">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <em>Please go to <a href="http://register.mos.com.np" target="_blank">http://register.mos.com.np</a> then after logging in with your respective username and password click "edit domain info" then edit your Primary and Secondary nameserver details with Access World details.Please follow the example shown below</em>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <h2>Publish Website</h2>
                            <div class="well">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group"> 
                                            {{ Form::radio('web', 'awt', true, ['class'=>'form-control', 'required', 'id' => 'web-awt']) }}
                                            {{ Form::label('web-awt', 'AWT*', ['title' => 'AccessWorld Tech.']) }}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            {{ Form::radio('web', 'other', false, ['class'=>'form-control', 'required', 'id' => 'web-other']) }}
                                            {{ Form::label('web-other', 'Other') }}
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1 hidden" id="oserver-wrapper">
                                        <div class="form-group">
                                            {{ Form::text('oserver', null, ['class' => 'form-control', 'required', 'placeholder' => 'Please specify the IP address of your webserver', 'id' => 'oserver']) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <h2 class="text-center">Email Service</h2>
                            <div class="well">
                                <div class="row">
                                    <div class="col-sm-3">
                                        {{ Form::radio('mx', 'awt', true, ['class' => 'form-control', 'required', 'id' => 'mx-awt']) }}
                                        {{ Form::label('mx-awt', 'AWT*', ['title' => 'AccessWorld Tech.']) }}
                                    </div>
                                    <div class="col-sm-3">                                        
                                        {{ Form::radio('mx', 'google', false, ['class' => 'form-control', 'required', 'id' => 'mx-google']) }}
                                        {{ Form::label('mx-google', 'Google') }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ Form::radio('mx', 'yahoo', false, ['class'=>'form-control', 'required', 'id' => 'mx-yahoo']) }}
                                        {{ Form::label('mx-yahoo', 'Yahoo') }}
                                    </div>
                                    <div class="col-sm-3">
                                        {{ Form::radio('mx', 'other', false, ['class'=>'form-control', 'required', 'id' => 'mx-other']) }}
                                        {{ Form::label('mx-other', 'Other') }}
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1 hidden" id="mxserver-wrapper">
                                        {{ Form::text('mxserver', null, ['class' => 'form-control', 'required', 'placeholder' => 'Please server name', 'id' => 'mxserver']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="form-group">
                                    {{ Form::button('Submit', ['class' => 'form-control btn btn-primary text-default', 'id' => 'btn-submit']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>
@stop

@section('footer')
    <script type="text/javascript">
        $(document).ready(function () {
            $( "input:radio" ).change(function(e) {
                let radio = $(this);
                var wrapper;
                if(radio.attr("name") == "web"){
                    wrapper = $("#oserver-wrapper");
                } else if (radio.attr("name") == "mx") {
                    wrapper = $("#mxserver-wrapper");
                }
                if(radio.is(":checked") && radio.val() == "other"){
                    wrapper.removeClass("hidden");
                } else {
                    wrapper.addClass("hidden");
                }
            });

            $("#btn-submit").click(function (e) {
                e.preventDefault();
                $(".hidden").detach();
                $("#free-dns-form").submit();
            });
        })
    </script>
@stop
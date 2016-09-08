@extends('layouts.master')

@section('title', 'Free DNS | Verification')

@section('header')
@stop

@section('body')
    <section class="container">
        <div class="panel pane-default">
            <div class="panel-body">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h2>Free DNS Verification</h2>
                    {{ Form::open(['route' => 'customer.freeDns.verify', 'class' => 'form-horizontal', 'role' => 'form']) }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {{ Form::label('verification_code', 'Verification Code') }}
                                    {{ Form::text('verification_code', old('verification_code'), ['class'=>'form-control', 'required', 'placeholder' => 'Enter verification code']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="form-group">
                                    {{ Form::submit('Submit', ['class' => 'form-control btn btn-primary text-default']) }}
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@stop

@section('footer')
@stop
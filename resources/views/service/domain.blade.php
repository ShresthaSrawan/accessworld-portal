@extends('layouts.master')

@section('title', 'Services')

@section('header')
@stop

@section('body')

    @include('commons.banner', ['banner' => $servicePage->image] )

    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="card" style="padding: 20px 20px 50px;">
                    {{ Form::open(['route' => ['service.domain', $service->slug], 'class' => 'form form-horizontal']) }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    {{ Form::text('domain_name', old('domain_name'), ['class' => 'form-control']) }}
                                    <span class="input-group-btn">
                                        <button class="btn btn-lg btn-primary" type="button">Search</button>
                                    </span>
                                </div>
                            </div>
                        </div> 
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('footer')
@stop
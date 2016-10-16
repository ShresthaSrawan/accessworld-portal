@extends('layouts.master')

@section('title', 'Home')

@section('body')

    @include('commons.slider', [ 'sliders' => $sliders ])

    @unless($events->isEmpty())
        <section class="style-success section-shadow-top">
            <div class="container">
                <div class="row text-default-bright">
                    @include('partials.events')
                </div>
            </div>
        </section>
    @endunless

    <section class="style-default-light">
        <div class="row"> 
            <div class="col-sm-8 col-sm-offset-2" >
                {{ Form::open( [ 'route' => ['service.show', 'domain'], 'class' => 'form domain-validate', 'role' => 'form', 'novalidate' ] ) }}
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><h2 class="text-light no-margin">Get Your Domain:</h2></span>
                        <div class="input-group-content">
                            {{ Form::text('domain', old('domain'), ['class' => 'form-control', 'required', 'placeholder' => 'example.com']) }}
                            <label></label>
                        </div>
                        <div class="input-group-btn">
                            <button class="btn btn-accent ink-reaction" type="submit">
                                <i class="fa fa-search"></i> Check Availability
                            </button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}
                <div class="row">
                @foreach($tldLogos as $tld)
                    <div class="col-lg-2 col-sm-6 col-xs-6 col-xs-offset-3 col-md-offset-0 col-lg-offset-1">
                        <div class="holder">
                            <img class="img-responsive" src="{{ asset('assets/img/logos/'.$tld['slug'].'_logo.png') }}" width=" 300" height="125" style="min-height: 82px;" />
                            <div class="text-center">
                                <p class="text-xl text-light no-margin">@ {{ get_opensrs_price($tld['price'], true, false) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="style-primary section-shadow">
        <div class="container">
            <div class="row text-default-bright">
                @include('partials.certificates')
            </div>
        </div>
    </section>

    <section class="style-default">
        <div class="container">
            <div class="animated fadeInUp text-center">
                <h2 class="text-medium text-xxl">Featured Plans & pricing</h2>
                <div class="section-title-line"></div>
                <p class="text-xl text-light">Check out our pricing tables</p>
            </div>
            <div class="row">
                @include('partials.featuredpackages')
            </div>
        </div>
    </section>

    <section class="style-primary section-shadow">
        <div class="container">
            <div class="animated fadeInUp text-center text-default-bright">
                <h2 class="text-medium text-xxl">Testimonials</h2>
                <div class="section-title-line-inverse"></div>
                <p class="text-xl text-light">What People Say</p>
            </div>
            <div class="row">
                @include('partials.testimonials')
            </div>
        </div>
    </section>

    <section class="client-section">
        <div class="container">
            <div class="animated fadeInUp text-center">
                <h2 class="text-medium text-xxl">Clients</h2>
                <div class="section-title-line"></div>
                <p class="text-xl text-light">Some of our valued clients</p>
            </div>
            <div class="row">
                @include('partials.clients')
            </div>
        </div>
    </section>
@stop

@section('footer')
    {{ Html::script('assets/js/domain.validation.js') }}
@stop
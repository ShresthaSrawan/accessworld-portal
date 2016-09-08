@extends('layouts.master')

@section('title', 'Register Domain')

@section('header')
  <style>
    .for_card {
      padding:15px;
      height:250px;
    }
  </style>
@stop

@section('meta:description', $service->short_description)
@section('og:title', 'Domain Registration Services')
@section('og:description', $service->short_description)
@section('og:image', asset($service->image->path))
@section('og:width', '720')

@section('body')
  @include('commons.banner', [ 'banner' => $servicePage->image, 'banners' => $service->banner ] )
  
  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="animated fadeInUp text-center">
            <h2 class="text-medium">Domain Registration</h2>
            <div class="section-title-line"></div>
            <p>{{ $service->short_description }}</p>
          </div>
          <div class="row">
            @include('services.description')
          </div>
          <div class="card border-bottom-accent-light" id="domainInputForm">
            <form class="form domain-validate" novalidate data-submit="nosubmit">
              <div class="card-body">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">www.</span>
                    <div class="input-group-content">
                      {{ Form::text('domain', isset($domain) ? $domain : old('domain'), ['class' => 'form-control', 'required', 'id' => 'domain_name']) }}
                      <label>Enter a domain name</label>
                    </div>
                    <div class="input-group-btn">
                      <button id="btn-domain-check" class="btn btn-accent ink-reaction" type="button" data-source="{{ route('api.domain.check') }}" data-name-suggest="{{ route('api.domain.suggest') }}">
                        <i class="fa fa-search"></i> Search Domain
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="card border-bottom-accent-light{{ isset($search) ? '' : ' hidden' }}" id="domainAvailability">
            @if(isset($search))
              @include('services.domain.partials.availability')
            @endif
          </div>
        </div>
        <div class="col-sm-10 col-sm-offset-1" id="nameSuggest">
          @if(isset($search))
              @include('services.domain.partials.suggest')
            @endif
        </div>
      </div>
      <br/>
    </div>
  </section>
@stop

@section('footer')
  {{ Html::script('assets/js/domain.validation.js') }}
  {{ Html::script('assets/js/domain.check.js') }}
@stop

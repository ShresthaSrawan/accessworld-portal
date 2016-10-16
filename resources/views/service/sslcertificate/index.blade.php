@extends('layouts.master')

@section('title', ' | '.$service->name)

@section('header')
@stop

@section('body')
  @include('commons.banner', [ 'banner' => $servicePage->image, 'banners' => $service->banner ] )

  <section>
    <div class="container">
      <div class="row">
        <div class="animated fadeInUp text-center">
          <h2 class="text-medium">{{ $service->name }}</h2>
          <div class="section-title-line"></div>
          <p>{{ $service->short_description }}</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8 col-xs-12">
          <div class="row">
          @include('services.description')
          </div>
          <div class="card">
            <div class="card-head">
              <header>Choose SSL Certificate Type</header>
            </div>
            <div class="card-body">
              <form id="formSslCertificate" class="form form-validate domain-validate" role="form" action="{{ route('service.ssl.create') }}" method="POST">
                {!! csrf_field() !!}
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <select class="form-control" id="supplierList" name="ssl_provider">
                        @foreach($sslProviders as $provider)
                          <option value="{{ $provider->slug }}" class="supplier">{{ $provider->name }}</option>
                        @endforeach
                      </select>
                      <label for="ssl-provider">Select a supplier</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      @foreach($sslProviders as $provider)
                        <select class="form-control hidden" id="{{ $provider->slug }}ProductTypeList" name="ssl_product_type">
                          <option value="" selected="selected">Select a service</option>
                          @foreach($provider->productTypes as $type)
                            <option value="{{ $type->slug }}">{{ $type->name }}</option>
                          @endforeach
                        </select>
                      @endforeach
                      <label for="ssl-product-type">Select a service</label>
                    </div>
                  </div>
                  <div class="hidden" id="productTypeInfo" data-source="{{ route('api.ssl.product.info') }}">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-sm-4 col-xs-12">
          <div class="row">
          @foreach($sslProviders as $provider)
            <div class="col-sm-6 col-xs-6">
              <img src="{{ asset('assets/img/logos/'.$provider->slug.'logo_vertical.png') }}" class="img-responsive" style="margin-left:60px;width: 150px;">
            </div>
          @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('footer')
  {{ Html::script('assets/js/domain.validation.js') }}
  {{ Html::script('assets/js/ssl.info.js') }}
@stop
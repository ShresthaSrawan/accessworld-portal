@extends('layouts.master')

@section('title', 'Web | Order')

@section('header')
@stop

@section('body')

  @include('commons.banner', [ 'banner' => $servicePage->image, 'banners' => $service->banner ] )

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <h2 class="text-primary">Web Hosting</h2>
          <article class="margin-bottom-xxl">
            <p class="lead">
              {{ $service->short_description }}
            </p>
            <h3>{{ $webPackage->name }}</h3>
            <p class="lead">
              {{ $webPackage->description }}
            </p>
          </article>
        </div><!--end .col -->
        <div class="col-xs-12 col-md-8">
          {{ Form::open(['route' => [ 'service.web.store', $webPackage->slug ], 'class' => 'form form-validate', 'role' => 'form', 'novalidate']) }}
          {{ Form::hidden('package',$webPackage->slug) }}
          @include('services.web.form')
          {{ Form::close() }}
          <em class="text-caption text-right">This item will be added to cart</em>
        </div><!--end .col -->
      </div>
    </div>
  </section>
  
@stop

@section('footer')
  <script>
    var servicePriceURI = '{{ route('service.web.custom.price') }}';
  </script>
  {{ Html::script('assets/js/service.order.js') }}
@stop
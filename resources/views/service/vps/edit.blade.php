@extends('layouts.master')

@section('title', 'VPS | Edit Order')

@section('header')
@stop

@section('body')
  @include('commons.banner', ['banner' => $servicePage->image] )

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <h2 class="text-primary">Edit VPS Order</h2>
          <article class="margin-bottom-xxl">
            <p class="lead">
              {{ $service->short_description }}
            </p>
            <h3>{{ $vpsPackage->name }}</h3>
            <p class="lead">
              {{ $vpsPackage->description }}
            </p>
          </article>
        </div><!--end .col -->
        <div class="col-xs-12 col-md-8">
          {{ Form::model($item, ['route' => [ 'service.vps.update', $vpsPackage->slug, $item['rowid']], 'class' => 'form form-validate', 'role' => 'form', 'novalidate', 'method' => 'PUT']) }}
          {{ Form::hidden('package',$vpsPackage->slug) }}
          @include('services.vps.form')
          {{ Form::close() }}
          <em class="text-caption text-right">This item will be added to cart</em>
        </div><!--end .col -->
      </div>
    </div>
  </section>
@stop

@section('footer')
  <script>
    var servicePriceURI = '{{ route('service.vps.custom.price') }}';
  </script>
  {{ Html::script('assets/js/service.order.js') }}
@stop
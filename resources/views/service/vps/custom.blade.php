@extends('layouts.master')

@section('title', 'VPS | Custom')

@section('header')
  {{ Html::style('vendor/ion.rangeSlider-2.1.2/css/ion.rangeSlider.css') }}
  {{ Html::style('vendor/ion.rangeSlider-2.1.2/css/ion.rangeSlider.skinFlat.css') }}
  {{ Html::style('vendor/ion.rangeSlider-2.1.2/css/normalize.css') }}
@stop

@section('body')

  @include('commons.banner', [ 'banners' => $service->banner ] )

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
          {{ Form::open([ 'route' => ['service.custom.store', $service->slug], 'class' => 'form form-validate', 'novalidate' , 'data-url' => route('service.custom.price', $service->slug), 'id' => 'form-custom-plan']) }}
            <div class="card">
              <div class="card-head">
                <header class="custom-title">Make a VPS Custom Plan</header>
              </div>
              @include('service.vps.customForm')
            </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </section>
  
@stop

@section('footer')
  {{ Html::script('vendor/ion.rangeSlider-2.1.2/js/ion-rangeSlider/ion.rangeSlider.min.js') }}
  <script>
    var $form = $('#form-custom-plan');
    var $price = $('.service-price');
    var url = $form.data('url');

    var refreshPrice = function () {
      clearTimeout(queue);
      queue = setTimeout(function() {
        $.ajax({
          url: url,
          type: 'POST',
          data: $form.serialize(),
          success: function (response) {
            $price.html(response);
          }
        });
      }, 500);
    };
  </script>
  {{ Html::script('assets/js/price.js') }}
@stop
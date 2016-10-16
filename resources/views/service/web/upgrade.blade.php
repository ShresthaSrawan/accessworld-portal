@extends('layouts.master')

@section('title', 'Services')

@section('header')
{{ Html::style('vendor/ion.rangeSlider-2.1.2/css/ion.rangeSlider.css') }}
{{ Html::style('vendor/ion.rangeSlider-2.1.2/css/ion.rangeSlider.skinFlat.css') }}
{{ Html::style('vendor/ion.rangeSlider-2.1.2/css/normalize.css') }}
{{ Html::style('assets/css/custom-slider.css') }}
@stop

@section('body')

    @include('commons.banner', ['banner' => $servicePage->image] )

    {{ var_dump($errors) }}
    <section id="content">
        <div class="container-fluid">
            <div class="white-section">
                {{ Form::model($item, [ 'route' => ['service.vps.upgradePost', $item['uuid']], 'class' => 'form form-validate slider-form', 'novalidate' , 'data-url' => route('service.vps.upgrade.price', $item['uuid']), 'method' => 'PUT']) }}
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 white-bg padding">
                        <h2 class="custom-title">Edit a Custom Plan</h2>
                        @include('services.vps.upgradeForm')
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </section>

@stop

@section('footer')
    {{ Html::script('vendor/jquery-validation/dist/jquery.validate.min.js') }}
    {{ Html::script('vendor/jquery-validation/dist/additional-methods.min.js') }}
    {{ Html::script('assets/js/form.js') }}
    {{ Html::script('vendor/ion.rangeSlider-2.1.2/js/ion-rangeSlider/ion.rangeSlider.min.js') }}
    <script>
        var $form = $('.slider-form');
        var $price = $('.service-price');
        var url = $form.data('url');
        var item = {!! json_encode($item) !!};

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
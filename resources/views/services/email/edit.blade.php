@extends('layouts.master')

@section('title', 'Email | Order')

@section('header')
@stop

@section('body')

    @include('commons.banner', ['banner' => $servicePage->image] )

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <h2 class="text-primary">Edit Enterprise Secure Email Order</h2>
                    <article class="margin-bottom-xxl">
                        <p class="lead">
                            {{ $service->short_decription }}
                        </p>
                        <h3>{{ $emailPackage->name }}</h3>
                        <p class="lead">
                            {!! $emailPackage->description !!}
                        </p>
                    </article>
                </div><!--end .col -->
                <div class="col-xs-12 col-md-8">
                    {{ Form::model($item, ['route' => [ 'service.email.update', $emailPackage->slug, $item['rowid']], 'class' => 'form form-validate', 'role' => 'form', 'novalidate', 'method' => 'PUT']) }}
                    {{ Form::hidden('package', $emailPackage->slug) }}
                    @include('services.email.form')
                    {{ Form::close() }}
                    <em class="text-caption text-right">This item will be added to cart</em>
                </div><!--end .col -->
            </div>
        </div>
    </section>

@stop

@section('footer')
    <script>
        var servicePriceURI = '{{ route('service.email.custom.price') }}';
    </script>
    {{ Html::script('assets/js/service.order.js') }}
@stop
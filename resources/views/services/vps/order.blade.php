@extends('layouts.master')

@section('title', 'VPS | Order')

@section('header')
@stop

@section('body')
    @include('commons.banner', [ 'banner' => $servicePage->image, 'banners' => $service->banner ] )

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-4">
                    <h2 class="text-primary">Virtual Private Server</h2>
                    <article class="margin-bottom-xxl">
                        <p class="lead">
                            {{ $service->short_description }}
                        </p>
                        <h3>{{ $vpsPackage->name }}</h3>
                        <p class="lead">
                            {{ $vpsPackage->description }}
                        </p>
                        {{--<h3>--}}
                        {{--Customize this package to suit your needs--}}
                        {{--</h3>--}}
                        {{--<a class="btn btn-accent ink-reaction" href="{{ route('service.'.$service->slug.'.package.edit', $vpsPackage->slug) }}" style="margin-top: 0.6em;">--}}
                        {{--Configure this Plan--}}
                        {{--</a>--}}
                    </article>
                </div><!--end .col -->
                <div class="col-xs-12 col-md-8">
                    {{ Form::open(['route' => [ 'service.vps.store', $vpsPackage->slug ], 'class' => 'form form-validate', 'role' => 'form', 'novalidate']) }}
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
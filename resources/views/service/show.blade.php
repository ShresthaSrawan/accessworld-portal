@extends('layouts.master')

@section('title', "$service->name Service")

@section('meta:description', $service->short_description)
@section('og:title', 'VPS Hosting Services')
@section('og:description', $service->short_description)
@section('og:image', !$service->image ?: asset($service->image->path))
@section('og:width', '720')

@section('body')

    @include('commons.banner', [ 'banners' => $service->banner ] )

    <section>
        <div class="container">
            <div class="row">
                <div class="animated fadeInUp text-center">
                    <h2 class="text-medium">Virtual Private Server</h2>
                    <div class="section-title-line"></div>
                    <p>Choose from the packages <a href="#service-packages" class="text-primary">below</a> or create a
                        <a href="{{ route('service.custom.create', $service->slug) }}" class="text-primary">custom one</a></p>
                </div>

                @unless(empty($service->description))
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <article>
                                    <p class="text-justify">{!! $service->description !!}</p>
                                </article>
                            </div>
                        </div>
                    </div>
                @endunless

                <div id="service-packages" itemscope itemtype="http://schema.org/Product">
                    @php
                    $function = camel_case($service->slug).'Packages';
                    @endphp
                    @foreach( $function() as $package)
                        <?php
                        $active = $package->is_active ? 'style-primary' : 'style-gray';
                        $btn_color = $package->is_active ? 'btn-primary' : 'btn-accent';
                        ?>
                        <div class="col-xs-6 col-md-3">
                            <div class="card card-type-pricing text-center">
                                @if($hasDiscount = $package->discount_percent > 0)
                                    <div class="ribbon" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                      <span>
                                        {{ $package->discount_percent }}
                                          % off
                                      </span>
                                    </div>
                                @endif
                                <div class="card-body {{ $active }}">
                                    <h2 class="text-light text-default-bright">{{ $package->name }}</h2>
                                    <p class="text-lg text-default-bright" itemprop="name"><em>Virtual Private
                                            Server</em></p>
                                    <div class="price text-default-bright">
                                        <div>Starting at @if($hasDiscount)<s>{{ $package->price }}</s> @endif</div>
                                        <span class="text-lg" itemprop="priceCurrency"
                                              content="get_local_currency_code()">{{ site('currency') }}</span>
                                        <h2><span class="text-lg"
                                                  itemprop="price">{{ $package->discounted_price, true }}</span>
                                        </h2> <span>/mo</span>
                                    </div>
                                    <br/>
                                </div><!--end .card-body -->
                                <div class="card-body no-padding" itemprop="description">
                                    <ul class="list-unstyled">
                                        @foreach($package->getComponents() as $component => $value)
                                        <li>{{ strtoupper($component) }} {{ $value }}</li>
                                        @endforeach
                                        <li>24/7 Customer Support</li>
                                    </ul>
                                </div><!--end .card-body -->
                                <div class="card-body">
                                    <a href="{{ route('service.package.order', [$service->slug, $package->slug]) }}"
                                       class="btn btn-raised ink-reaction {{ $btn_color }}">
                                        Get quote
                                    </a>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                    @endforeach
                </div>
            </div>
            @include('service.customsection')
            <div class="row">
                <div class="animated fadeInUp text-center">
                    <h2 class="text-light">Features</h2>
                    <p>The Key Features of AccessWorld</p>
                </div>
                <div class="card">
                    @include("commons.feature")
                </div>
            </div>
        </div>
    </section>
@stop

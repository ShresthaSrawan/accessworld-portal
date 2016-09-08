@extends('layouts.master')

@section('title', "$service->name")

@section('meta:description', $service->short_description)
@section('og:title', 'Email Hosting Services')
@section('og:description', $service->short_description)
@section('og:image', !$servicePage->image ?: asset($servicePage->image->path))
@section('og:width', '720')

@section('body')

    @include('commons.banner', [ 'banner' => $servicePage->image, 'banners' => $service->banner ] )

    <section>
        <div class="container">
            <div class="row">
                <div class="animated fadeInUp text-center">
                    <h2 class="text-medium">Enterprise Secure Email</h2>
                    <div class="section-title-line"></div>
                    <p>Choose from the packages <a href="#service-packages" class="text-primary">below</a> or create a
                        <a href="{{ route('service.email.custom.create') }}" class="text-primary">custom one</a></p>
                </div>
                @include('services.description')
                <div id="service-packages" itemscope itemtype="http://schema.org/Product">
                    @foreach($packages as $package)
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
                                    <div>Starting at @if($hasDiscount)<s>{{ get_local_price($package->price) }}</s> @endif</div>
                                    <p class="text-lg text-default-bright" itemprop="name"><em>Enterprise Secure
                                            Email</em></p>
                                    <div class="price text-default-bright">
                                        <span class="text-lg" itemprop="priceCurrency"
                                              content="get_local_currency_code()">{{ get_local_currency_prefix() }}</span>
                                        <h2><span class="text-lg"
                                                  itemprop="price">{{ get_local_price($package->discounted_price, true) }}</span>
                                        </h2> <span>/mo</span>
                                    </div>
                                    <br/>
                                </div><!--end .card-body -->
                                <div class="card-body no-padding" itemprop="description">
                                    <ul class="list-unstyled">
                                        <li>{{ $package->domain }} {{ $package->domain > 1 ? "Domains" : "Domain" }}</li>
                                        <li>{{ strpos( $package->traffic, '.' ) ? ($package->traffic*1000).' MB' : ($package->traffic).' GB' }}
                                            Traffic
                                        </li>
                                        <li>{{ strpos( $package->disk, '.' ) ? ($package->disk*1000).' MB' : ($package->disk).' GB' }}
                                            Storage
                                        </li>
                                        <li>24/7 Customer Support</li>
                                    </ul>
                                </div><!--end .card-body -->
                                <div class="card-body">
                                    <a href="{{ route('service.email.create', $package->slug) }}"
                                       class="btn btn-raised ink-reaction {{ $btn_color }}">
                                        Get quote
                                    </a>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .col -->
                    @endforeach
                </div>
            </div>
            @include('services.customsection')
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

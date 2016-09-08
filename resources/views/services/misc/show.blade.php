@extends('layouts.master')

@section('title', "$service->name")

@section('meta:description', $servicePage->short_description)
@section('og:title', $service->name.' Services')
@section('og:description', $servicePage->short_description)
@section('og:image', asset($servicePage->image->path))
@section('og:width', '720')

@section('body')

  @include('commons.banner', ['banner' => $servicePage->image] )

  <section>
    <div class="container">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <article class="text-justify">
              <div class="animated fadeInUp">
                <h2 class="text-medium">{{ $service->name }}</h2>
                <p>{{ $service->short_description }}</p>
              </div>
              {!! $service->description !!}
            </article>
          </div>
        </div>
      </div>
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

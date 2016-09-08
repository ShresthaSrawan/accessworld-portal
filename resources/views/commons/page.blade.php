@extends('layouts.master')

@section('title', $subPage->title)

@section('body')

  @include('commons.banner', [ 'banner' => $page->image ])

  <section class="section-shadow">
    <div class="container">
      <div class="card">
        <div class="card-head">
          <header>{{ $subPage->title }}</header>
        </div>
        <div class="card-body" style="padding-top: 0;">
          <article>
            <p class="text-justify">{!! $subPage->description !!}</p>
          </article>
        </div>
      </div>
    </div>
  </section>

@stop

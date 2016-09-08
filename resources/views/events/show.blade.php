@extends('layouts.master')

@section('title', 'Event')

@section('body')

    @include('commons.banner', [ 'banner' => $event->image ])

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 animated fadeInRight">
                    <article class="card cart-default-bright">
                        <div class="card-head">
                            <header><h2>{{ $event->title }}</h2></header>
                        </div>
                        <div class="card-body text-justify text-lg">
                            <p>{!! $event->description !!}</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

@stop

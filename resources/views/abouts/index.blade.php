@extends('layouts.master')

@section('title','About')

@section('body')

  @include('commons.banner', [ 'banner' => $aboutPage->image ])

  <section class="section-shadow">
    <div class="container">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-9 animated fadeInLeft">
              <article>
                <h3 class="text-medium">{{ is_empty($aboutPage->title ) ? "Lorem ipsum." : $aboutPage->title }}</h3>
                @if(is_empty($aboutPage->description))
                  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid
                    culpa dolores fugit labore molestias, numquam odio porro provident quo reprehenderit
                    sapiente, sit suscipit tempore, totam unde vel. Impedit mollitia provident quia
                    repellat! Ab accusantium alias, distinctio esse explicabo ipsam modi! Ducimus facilis
                    neque perferendis quos! Perferendis, reiciendis!</p>
                @else
                  <p class="text-justify">{!! $aboutPage->description !!}</p>
                @endif
              </article>
            </div>
            <div class="col-md-3 animated fadeInRight">
              <article>
                <h3 class="text-medium">The Cloud Provider:</h3>
                @if(is_empty($aboutPage->short_description))
                  <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aspernatur blanditiis
                    cumque delectus error eveniet facere facilis fuga molestiae nam numquam odio porro,
                    vel voluptas.</p>
                @else
                  <p class="text-justify">{{ $aboutPage->short_description }}</p>
                @endif
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@stop

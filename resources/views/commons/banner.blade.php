@if(isset($banners) && !$banners->images->isEmpty())
    <section class="slick-carousel full-bleed">
        @foreach($banners->images as $key => $banner)
            <div class="slick-carousel-item" style="background-image: url('{{ is_null($banner) ? asset('assets/img/avatar_slider.png') : asset($banner->thumbnail(1350,248)) }}'); background-size: cover; background-repeat: no-repeat;">
                <div class="overlay banner-overlay-shade-top stick-top-left height-3"></div>
                <div class="row" style="height: 248px"></div>
                <div class="overlay banner-overlay-shade-bottom stick-bottom-left force-padding text-right"></div>
            </div><!--end .section-body -->
        @endforeach
    </section>
@else
    {{--<section class="full-bleed">--}}
        {{--<div class="section-body style-default-dark text-shadow">--}}
            {{--<div class="img-backdrop" style="background-image: url('{{ is_null($banner) ? asset('assets/img/avatar_slider.png') : asset($banner->path) }}')"></div>--}}
            {{--<div class="overlay banner-overlay-shade-top stick-top-left height-3"></div>--}}
            {{--<div class="row" style="height: 248px"></div>--}}
            {{--<div class="overlay banner-overlay-shade-bottom stick-bottom-left force-padding text-right"></div>--}}
        {{--</div><!--end .section-body -->--}}
    {{--</section>--}}
@endif
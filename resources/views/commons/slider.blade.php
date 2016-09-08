<div class="slick-carousel no-margin loading-spinner height-10" data-arrows="true" id="home-slider">
    @if($sliders->isEmpty())
        <div class="slick-carousel-item">
            <img data-lazy="{{ asset('assets/img/avatar_slider.png') }}" alt="slider-image">
            <div class="carousel-caption">
                ...
            </div>
        </div>
    @else
        @foreach($sliders as $key => $slider)
            <div class="slick-carousel-item height-10 holder" style="background: url('{{ file_exists(public_path($slider->image->path)) ? $slider->image->thumbnail(1350,400) :  asset('assets/img/avatar_slider.png') }}');">
                @unless(empty($slider->title) && empty($slider->caption) && empty($slider->link_url))
                <div class="slick-carousel-caption overlay text-left text-shadow container">
                    @unless(empty($slider->title))
                        @if($key==0)
                            <h1 class="text-default-bright text-xxxl">{{ $slider->title }}</h1>
                        @else
                            <h2 class="text-default-bright text-xxxl">{{ $slider->title }}</h2>
                        @endif
                    @endunless
                    @unless(empty($slider->caption))
                        <p class="text-default-bright text-light text-lg hidden-xs">{{ mb_strimwidth($slider->caption, 0, 150, "...") }}</p>
                    @endunless
                    @unless(empty($slider->link_url))
                        <a href="{{$slider->link_url}}" class="btn ink-reaction btn-raised btn-primary">
                            {{ display($slider->link_caption, 'Link') }}
                        </a>
                    @endunless
                </div>
                @endunless
            </div>
        @endforeach
    @endif
</div>
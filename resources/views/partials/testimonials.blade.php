<div class="slick-carousel" >
    @if($testimonials->isEmpty())
        @for($i = 0; $i < 2; $i++)
        <div class="slick-carousel-item row">
            <div class="col-sm-3">
                <img src="{{ asset('assets/img/avatar_user.png') }}" alt="avatar_user" class="img-7 img-circle pull-right">
            </div>
            <div class="col-sm-9">
                <blockquote class="text-default-bright">
                    <p>Any man who reads too much and uses his own brain too little falls into lazy habits of thinking.</p>
                    <span class="text-caption">Albert Einstein</span>
                </blockquote>
            </div>
        </div>
        @endfor
    @else
        @foreach($testimonials->chunk(2) as $chunk)
            <div class="slick-carousel-item row">
                @foreach($chunk as $testimonial)
                    <div class="col-sm-6" itemscope itemprop="Person" itemtype="http://schema.org/Person">
                        <div class="row">
                            <div class="col-sm-4">
                                <img src="{{ $testimonial->customer->image->thumbnail(91,91) }}" alt="testimonial_{{$testimonial->customer->name}}" class="img-7 img-circle pull-right" width="91" height="91">
                            </div>
                            <div class="col-sm-8">
                                <blockquote class="text-default-bright">
                                    <p>{{ $testimonial->quote }}</p>
                                    <span class="text-caption no-margin" itemprop="name">{{ $testimonial->customer->display_name }}</span>
                                    <span class="text-caption no-margin"><em>{{ is_null($testimonial->customer->detail->company_name) ? '' : $testimonial->customer->detail->company_name }}</em></span>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
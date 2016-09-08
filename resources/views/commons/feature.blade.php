<div class="card-content slick-carousel">
    @if($features->isEmpty())
        <div class="row slick-carousel-item">
            @for($i = 0; $i < 3; $i ++)
                <div class="col-sm-4">
                    <div class="row animated fadeInUp">
                        <div class="col-xs-12 text-center">
                            <img src="{{ asset('assets/img/avatar1.jpg') }}" class="img-7">
                        </div>
                        <div class="col-xs-12 text-center">
                            <span class="text-medium text-xl">Lorem</span>
                            <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem eos facilis molestias nostrum praesentium quasi repudiandae unde ut, vel voluptatem!</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    @else
        @foreach($features->chunk(3) as $chunk)
            <div class="row slick-carousel-item">
                @foreach($chunk as $feature)
                <div class="col-sm-4">
                    <div class="row animated fadeInUp">
                        <div class="col-xs-12 text-center">
                            <img src="{{ asset($feature->image->path) }}" class="img-7" style="display: initial;">
                        </div>
                        <div class="col-xs-12 text-center">
                            <span class="text-medium text-xl">{{ $feature->title }}</span>
                            <p class="text-light">{{ $feature->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
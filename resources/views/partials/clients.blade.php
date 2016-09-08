<div class="slick-carousel" >
    @if($clients->isEmpty())
        <div class="row">
            @for($i = 0; $i < 4; $i++)
                <div class="col-xs-12 col-sm-6 col-md-3 text-center">
                    <img alt="client-{{$i+1}}" src="{{ asset('assets/img/avatar1.jpg') }}" class="margin-top-0-5" style="max-width:100%; display: initial;">
                </div>
            @endfor
        </div>
    @else
        @foreach($clients->chunk(4) as $chunk)
            <div class="row">
                @foreach($chunk as $key => $client)
                    <div class="height-3 col-xs-12 col-sm-6 col-md-3 text-center" itemprop="sponsor" itemscope itemtype="http://schema.org/Organization">
                        <a itemprop="url" href="{{ $client->website }}" target="_blank"><span class="hidden" itemprop="name">{{ $client->name }}</span><img alt="client_{{$client->name}}" src="{{$client->image->resize(200,50)}}" class="margin-top-0-5" style="max-width:100%; display: initial;" width="200" height="50"></a>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
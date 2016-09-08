<div class="card-content" itemprop="hasOfferCatalog" itemscope itemtype="http://schema.org/OfferCatalog">
@if($services->isEmpty())
  @for($i = 0; $i < 2; $i++)
    <div class="col-sm-6 animated fadeIn">
      <div class="card">
        <div class="card-head style-gray-light text-center">
          <img src="{{ asset('assets/img/avatar1.jpg') }}" class="img-icon margin-top-1">
          <h2 class="text-default-bright">Lorem ipsum.</h2>
        </div>
        <div class="card-body">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium cumque quaerat reprehenderit sequi suscipit vero.</p>
          <a href="#" class="btn btn-success btn-raised ink-reaction btn-buy">Buy</a>
        </div>
      </div>
    </div>
  @endfor
@else
  @foreach($services as $key => $service)
    @if(count($services) == 1)
    <div class="col-sm-6 col-sm-offset-3 animated fadeIn" itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog">
    @elseif(count($services) == 2)
    <div class="col-sm-6 animated fadeIn" itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog">
    @elseif(count($services) == 3 || count($services) >= 5)
    <div class="col-sm-4 animated fadeIn" itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog">
    @elseif(count($services) == 4)
    <div class="col-sm-3 animated fadeIn" itemprop="itemListElement" itemscope itemtype="http://schema.org/OfferCatalog">
    @endif
      <div class="card height-8">
        @if($offer = has_offer($service->slug))
          <div class="ribbon" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span>{{ $offer->name }}</span></div>
        @endif
        <div class="card-head style-alternate text-center">
          @if($service->image)
            <img src="{{ $service->image->path }}" class="img-icon margin-top-1">
          @endif
          <h2 class="text-default-bright" itemprop="name">{{ $service->name }}</h2>
        </div>
        <div class="card-body text-center">
          <p>{{ mb_strimwidth($service->short_description, 0, 122, '...') }}</p>
          <a href="{{route('service.show', $service->slug)}}" class="btn btn-success btn-raised ink-reaction btn-buy">
            @if($service->is_configurable)
              <i class="md md-local-offer"></i> Buy
            @else
              <i class="md md-search"></i> Know More
            @endif
          </a>
        </div>
      </div>
    </div>
  @endforeach
@endif
</div>

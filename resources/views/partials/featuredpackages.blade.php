@foreach($featuredPackages['vps_package'] as $key => $package)
<div class="col-md-3">
    <div class="card card-type-pricing text-center" itemscope itemtype="http://schema.org/Product">
        @if($hasDiscount = $package->discount_percent > 0)
            <div class="ribbon" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
          <span>
            {{ $package->discount_percent }}
              % off
          </span>
            </div>
        @endif
        <div class="card-body style-gray">
            <h2 class="text-light">{{ $package->name }}</h2>
            <p class="text-lg" itemprop="name"><em data-toggle="tooltip" title="Virtual Private Server">VPS</em></p>
            <div class="price">
                <div>@if($hasDiscount)<s>{{ get_local_price($package->price) }}</s> @endif</div>
                <h2><span class="text-xs" itemprop="priceCurrency" content="get_local_currency_code()">{{ get_local_currency_prefix() }}</span> <span class="text-lg" itemprop="price">{{ get_local_price($package->discounted_price, true) }}</span></h2> <span>/mo</span>
            </div>
            <br/>
        </div><!--end .card-body -->
        <div class="card-body no-padding" itemprop="description">
            <ul class="list-unstyled">
                <li>{{ $package->cpu }} Core CPU</li>
                <li>{{ $package->ram }} GB RAM</li>
                <li>{{ $package->disk }} GB Storage</li>
                <li>24/7 Customer Support</li>
            </ul>
        </div><!--end .card-body -->
        <div class="card-body">
            <a class="btn btn-raised ink-reaction btn-accent" href="{{ route('service.vps.create', $package->slug) }}">Get quote</a>
        </div><!--end .card-body -->
    </div><!--end .card -->
</div><!--end .col -->
@endforeach
@foreach($featuredPackages['web_package'] as $key => $package)
<div class="col-md-3">
    <div class="card card-type-pricing text-center" itemscope itemtype="http://schema.org/Product">
        @if($hasDiscount = $package->discount_percent > 0)
            <div class="ribbon" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
          <span>
            {{ $package->discount_percent }}
              % off
          </span>
            </div>
        @endif
        <div class="card-body style-gray">
            <h2 class="text-light">{{ $package->name }}</h2>
            <p class="text-lg" itemprop="name"><em>Website Hosting</em></p>
            <div class="price">
                <div>@if($hasDiscount)<s>{{ get_local_price($package->price) }}</s> @endif</div>
                <h2><span class="text-xs" itemprop="priceCurrency" content="get_local_currency_code()">{{ get_local_currency_prefix() }}</span> <span class="text-lg" itemprop="price">{{ get_local_price($package->price, true) }}</span></h2> <span>/mo</span>
            </div>
            <br/>
        </div><!--end .card-body -->
        <div class="card-body no-padding" itemprop="description">
            <ul class="list-unstyled">
                <li>{{ $package->domain }} {{ $package->domain > 1 ? 'Domains' : 'Domain' }}</li>
                <li>{{ strpos( $package->traffic, '.' ) ? ($package->traffic*1000).' MB' : ($package->traffic).' GB' }} Traffic</li>
                <li>{{ strpos( $package->disk, '.' ) ? ($package->disk*1000).' MB' : ($package->disk).' GB' }} Storage</li>
                <li>24/7 Customer Support</li>
            </ul>
        </div><!--end .card-body -->
        <div class="card-body">
            <a class="btn btn-raised ink-reaction btn-accent" href="{{ route('service.web.create', $package->slug) }}">Get quote</a>
        </div><!--end .card-body -->
    </div><!--end .card -->
</div><!--end .col -->
@endforeach
@foreach($featuredPackages['email_package'] as $key => $package)
<div class="col-md-3">
    <div class="card card-type-pricing text-center" itemscope itemtype="http://schema.org/Product">
        @if($hasDiscount = $package->discount_percent > 0)
            <div class="ribbon" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
          <span>
            {{ $package->discount_percent }}
              % off
          </span>
            </div>
        @endif
        <div class="card-body style-gray">
            <h2 class="text-light">{{ $package->name }}</h2>
            <p class="text-lg" itemprop="name"><em>Enterprise Email</em></p>
            <div class="price">
                <div>@if($hasDiscount)<s>{{ get_local_price($package->price) }}</s> @endif</div>
                <h2><span class="text-xs" itemprop="priceCurrency" content="get_local_currency_code()">{{ get_local_currency_prefix() }}</span> <span class="text-lg" itemprop="price">{{ get_local_price($package->price, true) }}</span></h2> <span>/mo</span>
            </div>
            <br/>
        </div><!--end .card-body -->
        <div class="card-body no-padding" itemprop="description">
            <ul class="list-unstyled">
                <li>{{ $package->domain }} {{ $package->domain > 1 ? 'Domains' : 'Domain' }}</li>
                <li>{{ strpos( $package->traffic, '.' ) ? ($package->traffic*1000).' MB' : ($package->traffic).' GB' }} Traffic</li>
                <li>{{ strpos( $package->disk, '.' ) ? ($package->disk*1000).' MB' : ($package->disk).' GB' }} Storage</li>
                <li>24/7 Customer Support</li>
            </ul>
        </div><!--end .card-body -->
        <div class="card-body">
            <a class="btn btn-raised ink-reaction btn-accent" href="{{ route('service.email.create', $package->slug) }}">Get quote</a>
        </div><!--end .card-body -->
    </div><!--end .card -->
</div><!--end .col -->
@endforeach
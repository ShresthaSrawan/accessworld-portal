@extends('layouts.master')

@section('title','Cart')

@section('header')
<style>
  #img-bigcart {
    background: url('/assets/img/cart-sprite.png');
    background-position: 0px 11px;
    background-size: cover;
    background-repeat: no-repeat;
    width: 155px;
    height: 120px;
  }
</style>
@stop

@section('body')
  @include('commons.banner', [ 'banner' => (object)['path' => asset('images/banners/cart-banner.png')] ])
  <section class="section-shadow">
    <div class="container">
      <div class="section-body">
        <div class="col-sm-5 hidden-xs">
          <div id="img-bigcart" class="text-center"></div>
          <h1>Your cart</h1>
          <p>
            {!!site_info('cart_info')!!}
          </p>
        </div>
        <div class="col-sm-7 col-xs-12">
          <?php $total = 0; ?>
          @if(Cart::count()>0)
            <div class="card card-underline">
              <div class="card-head">
                <header>My Cart</header>
              </div> 
              <div class="card-body no-padding">
                <ul class="list divider-full-bleed"> 
                  <li class="tile">
                    <div class="row padding-1">
                      <div class="col-xs-2 text-center">Service</div>
                      <div class="col-xs-4">Name</div>
                      <div class="col-xs-2">Action</div>
                      <div class="col-xs-1">Period</div>
                      <div class="col-xs-3 text-right">Price</div>
                    </div>
                  </li>
                @foreach(Cart::content() as $rowId => $item)
                  <li class="tile">
                    <div class="row padding-1">
                      @if($discount = $item->discount)
                        <div class="ribbon"><span>Discounted</span></div>
                      @endif
                      <div class="col-xs-2 text-center">
                        <img src="{{ $item->options->service->image->path }}" class="img-icon">
                      </div>
                      <div class="col-xs-4">
                        <dl class="no-margin">
                          <dd class="text-light text-lg">{{ mb_strimwidth($item->name, 0, 25, "...") }}</dd>
                          <dd class="text-medium text-lg">
                            {{ $item->options->service->name }}
                            @if(!is_null($item->options->renew))
                              <span class="text-xs">(Renewal)</span>
                            @endif
                          </dd>
                        </dl>
                      </div>
                      <div class="col-xs-2">
                        {{ Form::open(['route' => ['cart.destroy', $item->rowid], 'method'=>'DELETE']) }}
                          @if(is_null($item->options->renew) && !$item->options->service->isDomain() && !$item->options->service->isSslCertificate())
                            <a class="btn btn-xs ink-reaction btn-flat btn-primary" href="{{ is_null($item->options->package) ? route('service.'. $item->options->service->slug .'.custom.edit',[$item->rowid]) : route('service.'. $item->options->service->slug .'.edit',[$item->options->package->slug, $item->rowid]) }}">
                              <span >Edit</span>
                            </a>
                          @endif
                          <button type="submit" class="btn btn-xs ink-reaction btn-flat btn-danger">
                            <span >Remove</span>
                          </button>
                        {{ Form::close() }}
                      </div>
                      <div class="col-xs-1">
                        {{ $item->options->service->slug == 'domain' || $item->options->service->slug == 'ssl-certificate' ? $item->qty.' Year(s)' : get_actual_term($item->qty).' Month(s)' }}
                      </div>
                      <div class="col-xs-3 text-right">
                        @if(intval($item->discount) > 0)
                          <s>{{ get_local_price($item->subtotal) }}</s>
                        @endif
                        <p class="text-lg">
                          {{ get_local_price($item->discountedTotal()) }}
                        </p>
                      </div>
                    </div>
                  </li>
                @endforeach
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6">
                <div class="card">
                  <ul class="nav nav-pills nav-stacked">
                    <li>
                      <a class="ink-reaction">
                        Sub Total
                        <small class="pull-right text-bold">
                          {{ get_local_price(Cart::discountedTotal()) }}
                        </small>
                      </a>
                    </li>
                    <li>
                      <a class="ink-reaction">
                        VAT (13%)
                        <small class="pull-right text-bold">
                          {{ get_local_price(Cart::vatTotal(\App\Models\Invoice::getVat())) }}
                        </small>
                      </a>
                    </li>
                    <li>
                      <a class="ink-reaction text-bold text-lg">
                        Total
                        <small class="pull-right">
                          {{ get_local_price(Cart::discountedTotal()+Cart::vatTotal(\App\Models\Invoice::getVat())) }}
                        </small>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <button class="btn ink-reaction btn-info btn-block btn-checkout" data-toggle="modal" data-target="#paymentoption">
                          <i class="md md-shopping-cart"></i>
                          Proceed to Checkout
                        </button>
                      </div>
                      <div class="col-sm-12 text-center">
                        <div class="row">
                          <div class="col-sm-12"><span class="text-sm">Our Payment Partners</span></div>
                          <div class="col-sm-4"><img src="{{ asset('assets/img/visa.png') }}" class="img-responsive"></div>
                          <div class="col-sm-4"><img src="{{ asset('assets/img/esewa.png') }}" class="img-responsive"></div>
                          <div class="col-sm-4"><img src="{{ asset('assets/img/awtpay.png') }}" class="img-responsive"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @else
            <div class="card">
              <div class="card-head text-center">
                <h2>No items in Cart.</h2>
                <a href="{{ route('service.index') }}" class="btn btn-flat btn-primary ink-reaction text-lg">View Services</a>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- Modal -->
  <div class="modal fade text-center" id="paymentoption" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="card">
        <div class="card-head">
          <header><i class="fa fa-credit-card"></i> Payment Option</header>
        </div>
        <div class="card-body">
            @include('commons.paymentoptions')
            <p class="text-caption">Please select a payment option.</p>
        </div>
      </div>
    </div>
  </div>
@stop

@section('footer')
<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-checkout').click(function(){
      bootbox.dialog({
        'title': 'Payment Options',
        'message': ''
      });
    });
  });
</script>
@stop
<ul class="awt-cart hidden-xs">
  <li>
    <a href="javascript:void(0);" class="btn btn-accent btn-floating-action btn-cart btn-lg hover-to-click" data-toggle="dropdown">
      <i class="fa fa-shopping-cart"></i>
      @unless(Cart::count()==0)
        <sup class="badge style-success">{{ Cart::count(false) }}</sup>
      @endunless
    </a>
    <ul class="dropdown-menu animation-expand list">
      <li class="dropdown-header">Cart Items</li>
      @if(Cart::content()->isEmpty())
        <li class="tile">
          <div class="row">
            <div class="col-sm-12 text-center">
              No Items in Cart.
            </div>
            <div class="col-sm-12 text-center">
              <a class="btn btn-primary btn-sm ink-reaction btn-flat" href="{{ route('page.show', 'service') }}">View Services</a>
            </div>
          </div>
        </li>
      @else
        @foreach(Cart::content() as $item)
          <li id="row-{{$item->rowid}}" class="tile">
            <a class="tile-content ink-reaction">
              <div class="tile-icon"><img src="\{{ $item->options->service->image->path }}" class="img-icon"></div>
              <div class="tile-text">
                {{ mb_strimwidth($item->name, 0, 25, "...") }}
                <small>{{ $item->options->service->name }}</small>
              </div>
            </a>
            <a href="#" class="btn btn-flat">{{ get_local_price(round(($item->discountedTotal()) , 2)) }}</a>
          </li>
        @endforeach
        <li>
          <a href="{{ route('cart.index') }}" class="btn ink-reaction btn-flat btn-primary">
            <i class="fa fa-cart-arrow-down"></i> View Cart
          </a>
        </li>
      @endif
    </ul>
  </li>
</ul>
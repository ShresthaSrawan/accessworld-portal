<div class="offcanvas">
  <div id="responsive-menu" class="offcanvas-pane width-6 text-center">
    <div class="offcanvas-head">
      <header>AWT</header>
      <div class="offcanvas-tools">
        <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
          <i class="md md-close"></i>
        </a>
      </div>
    </div>

    <div class="offcanvas-body">
      <ul class="list-divided list-unstyled">
        <li>
            <a href="#" class="btn btn-flat btn-primary">Menu</a>
        </li>
        @if(Auth::user())
          <li><a href="{{ route('customer.index') }}" class="btn btn-flat btn-primary">My Account</a></li>
          <li><a href="{{ route('cart.index') }}" class="btn btn-flat btn-primary">My Cart</a></li>
        @endif
        <li><span class="opacity-75">{{ display_contact('phone') }}</span></li>
      </ul>
    </div>
  </div>
</div>
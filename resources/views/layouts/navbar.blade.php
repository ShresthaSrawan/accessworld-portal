<header id="header" class="header-navbar">
    <section class="headerbar">
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="visible-xs visible-sm">
                    <a href="#responsive-menu" class="btn btn-icon-toggle" data-toggle="offcanvas">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="header-nav-brand" >
                    <div class="brand-holder">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/img/logo_48x48.png') }}" alt="logo_accessworld" width="48" height="48">
                            <span class="text-lg text-bold" style="vertical-align: middle;">AccessWorld</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a href="tel:{{ display_contact('phone') }}" class="btn btn-flat ink-reaction">
                        <i class="fa fa-phone"></i>
                        <span class="hidden-xs hidden-sm">{{ display_contact('phone') }}</span>
                    </a>
                </li>
                <li>
                    <a href="mailto:{{ display_contact('email') }}" class="btn btn-flat ink-reaction">
                        <i class="fa fa-envelope"></i>
                        <span class="hidden-xs hidden-sm text-lowercase">{{ display_contact('email') }}</span>
                    </a>
                </li>
            </ul>
            <ul class="header-nav header-nav-options pull-right">
                <li>
                <a href="{{ route('cart.index') }}" class="btn btn-flat ink-reaction visible-xs">
                    <i class="md md-shopping-cart"></i>
                </a>
                </li>
            </ul>
        </div>
        <div class="headerbar-right hidden-xs hidden-sm">
            <ul class="header-nav header-nav-options">
                <li class="menu-item">
                    <a href="#">Menu</a>
                </li>
                @unless($user = Auth::user())
                    <li class="menu-item">
                        <a href="{{ url('login') }}">Login</a>
                    </li>
                @endunless
            </ul>
            @if($user)
                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <img src="{{ $user->image->thumbnail }}" alt="profile_picture" />
                            <span class="profile-info">
                                {{ $user->display_name }}
                                <small>{{get_local_price($user->getBalance())}}</small>
                            </span>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li><a href="{{ route('customer.index') }}"><i class="fa fa-dashboard"></i> My Account</a></li>
                            <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('logout') }}"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-profile -->
            @endif
        </div>
    </section>
</header>
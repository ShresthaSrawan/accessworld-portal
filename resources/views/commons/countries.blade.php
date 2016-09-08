<li class="dropdown">
    <a href="javascript:void(0);" class="btn btn-icon-toggle" data-toggle="dropdown">
        <i class="fa"><i class="flag-{{ country()->iso_alpha2 }}"></i></i>
    </a>
    <ul class="dropdown-menu animation-expand">
        <li class="dropdown-header">Supported Countries</li>
        @foreach(supported_countries() as $key => $country)
            <li>
                <a href="{{ route('country.session', $country->iso_alpha2) }}" rel="alternate" onClick="return confirm('Are you sure? This will reset your cart.');">
                    <i class="fa"><i class="flag-{{ $country->iso_alpha2 }}"></i></i>
                    <span class="country-name"><strong>{{ $country->name }}</strong></span>
                </a>
            </li>
        @endforeach
    </ul><!--end .dropdown-menu -->
</li>
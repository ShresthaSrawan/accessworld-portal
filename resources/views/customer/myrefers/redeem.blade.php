<header>
    <h3>Redeem</h3>
    <p class="text-caption">You can redeem your refer to your friends and colleagues here.</p>
</header>
<section>
    <ul class="list divider-full-bleed">
        <li class="tile">
            <a class="tile-content ink-reaction" href="#">
                <div class="tile-icon"><i class="fa fa-paper-plane-o"></i></div>
                <div class="tile-text">Total Refers Made</div>
            </a>
            <a class="btn btn-flat ink-reaction" href="#">{{ $customer->referrals()->withTrashed()->get()->count() }}</a>
        </li>
        <li class="tile">
            <a class="tile-content ink-reaction" href="#">
                <div class="tile-icon"><i class="fa fa-check"></i></div>
                <div class="tile-text">Total Refers Validated</div>
            </a>
            <a class="btn btn-flat ink-reaction" href="#">{{ $valid = $customer->referrals()->verified()->get()->count() }}</a>
        </li>
        <li class="tile">
            <a class="tile-content ink-reaction" href="#">
                <div class="tile-icon"><i class="fa fa-dollar"></i></div>
                <div class="tile-text">Total Refers Redeemed</div>
            </a>
            <a class="btn btn-flat ink-reaction" href="#">{{ $redeemed = $customer->referrals()->verified()->redeemed()->get()->count() }}</a>
        </li>
        <li class="tile">
            <a class="tile-content ink-reaction" href="#">
                <div class="tile-icon"><i class="fa fa-dollar"></i></div>
                <div class="tile-text">Total Eligible Refers</div>
            </a>
            <a class="btn btn-flat ink-reaction" href="#">{{ $left = $valid - $redeemed }}</a>
        </li>
        <div class="text-center">
            {{ Form::open([ 'route' => 'referral.redeem', 'method' => 'PUT' ]) }}
                <button type="button" class="btn btn-accent btn-lg margin-top-1 btn-submit {{ $left < config('awt.referral.minimum') ? 'disabled' : '' }}" data-message="redeem your referrals">
                    <i class="fa fa-dollar"></i>
                     Redeem My Refers
                </button>
            {{ Form::close() }}
        </div>
    </ul>
</section>
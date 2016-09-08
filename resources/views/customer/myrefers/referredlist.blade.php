<header>
    <h3>Refers Made</h3>
    <p class="text-caption">The refers you made appear here</p>
</header>
@if($invoices->isEmpty())
    <p class="text-center">You don't have any service orders.</p>
@else
    <p>
        <button type="button" class="btn btn-flat btn-accent btn-filter" data-group="referrals" data-filter="all">All</button>
        <button type="button" class="btn btn-flat btn-accent btn-filter" data-group="referrals" data-filter="verified">Verified</button>
        <button type="button" class="btn btn-flat btn-accent btn-filter" data-group="referrals" data-filter="redeemed">Redeemed</button>
        <button type="button" class="btn btn-flat btn-accent btn-filter" data-group="referrals" data-filter="pending">Pending</button>
        <button type="button" class="btn btn-flat btn-accent btn-filter" data-group="referrals" data-filter="rejected">Rejected</button>
    </p>
    @foreach($customer->referrals()->withTrashed()->get() as $key => $referral)
        <div class="list-item card referrals {{ $referral->getState() }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-1">
                        <i class="fa fa-bars list-icon"></i>
                    </div>
                    <div class="col-sm-4">
                        <p><span class="plabel">To: </span>{{ $referral->referred_customer_name }}</p>
                    </div>
                    <div class="col-sm-3">
                        <p><span class="plabel">Date: </span>{{ $referral->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="col-sm-4 text-right">
                        Status: {{ $referral->getState() }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
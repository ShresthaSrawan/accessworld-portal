<div class="card tabs-left sub-card card-underline">
	<ul class="card-head nav nav-tabs text-center style-default-light" data-toggle="tabs">
		<li class="active">
			<a href="#makerefer" data-toggle="tab">
				Make Referral
			</a>
		</li>
		<li>
			<a href="#referredlist" data-toggle="tab">
				My Referrals
			</a>
		</li>
		<li>
			<a href="#redeem" data-toggle="tab">
				Redeem
			</a>
		</li>
	</ul>
	<div class="card-body tab-content style-default-bright">
		<div class="tab-pane active" id="makerefer">
			@include('customer.myrefers.index')
		</div>
		<div class="tab-pane" id="referredlist">
			@include('customer.myrefers.referredlist')
		</div>
		<div class="tab-pane" id="redeem">
            @include('customer.myrefers.redeem')
		</div>
	</div>
</div>
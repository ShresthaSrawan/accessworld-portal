<div class="card sub-card tabs-left card-underline">
    <ul class="card-head nav nav-tabs text-center style-default-light" data-toggle="tabs">
        <li class="active">
            <a href="#orderinprogress-vps" data-toggle="tab">
                VPS
            </a>
        </li>
        <li>
            <a href="#orderinprogress-website" data-toggle="tab">
                Websites
            </a>
        </li>
        <li>
            <a href="#orderinprogress-email" data-toggle="tab">
                Email
            </a>
        </li>
        <!--<li>
            <a href="#orderinprogress-freedns" data-toggle="tab">
                Free DNS
            </a>
        </li>-->
    </ul>
    <div class="card-body tab-content style-default-bright">
        <div class="tab-pane active" id="orderinprogress-vps">
            @include('customer.orderinprogress.vps')
        </div>
        <div class="tab-pane" id="orderinprogress-website">
            @include('customer.orderinprogress.website')
        </div>
        <div class="tab-pane" id="orderinprogress-email">
            @include('customer.orderinprogress.email')
        </div>
        <!--<div class="tab-pane" id="orderinprogress-freedns">freedn
        </div>-->
    </div><!-- /content -->
</div><!-- /tabs -->
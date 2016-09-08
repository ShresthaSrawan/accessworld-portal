<div class="card tabs-left sub-card card-underline">
    
    <ul class="card-head nav nav-tabs text-center style-default-light" data-toggle="tabs">
        <li class="active">
            <a href="#service-vps" data-toggle="tab">
                <span class="hidden-xs">VPS</span><span class="visible-xs"><i class="fa fa-building"></i></span>
            </a>
        </li>
        <li>
            <a href="#service-web" data-toggle="tab">
                <span class="hidden-xs">Websites</span><span class="visible-xs"><i class="fa fa-globe"></i></span>
            </a>
        </li>
        <li>
            <a href="#service-email" data-toggle="tab">
                <span class="hidden-xs">Email</span><span class="visible-xs"><i class="fa fa-envelope"></i></span>
            </a>
        </li>
        <!--<li>
            <a href="#service-freedns" data-toggle="tab">
                <span class="hidden-xs">Free DNS</span><span class="visible-xs">F</span>
            </a>
        </li>-->
        <li>
            <a href="#service-domain" data-toggle="tab">
                <span class="hidden-xs">Domain</span><span class="visible-xs"><i class="fa fa-wikipedia-w"></i></span>
            </a>
        </li>
        <li>
            <a href="#service-ssl" data-toggle="tab">
                <span class="hidden-xs">SSL Certificate</span><span class="visible-xs"><i class="fa fa-lock"></i></span>
            </a>
        </li>
    </ul>
    <div class="card-body tab-content style-default-bright">
        <div class="tab-pane active" id="service-vps">
            @include('customer.services.vps')
        </div>
        <div class="tab-pane" id="service-web">
            @include('customer.services.web')
        </div>
        <div class="tab-pane" id="service-email">
            @include('customer.services.email')
        </div>
        {{-- <div class="tab-pane" id="service-freedns"> --}}
            {{-- @include('customer.services.freedns') --}}
        {{-- </div> --}}
        <div class="tab-pane" id="service-domain">
            @include('customer.services.domain')
        </div>
        <div class="tab-pane" id="service-ssl">
            @include('customer.services.sslcertificate')
        </div>
    </div>
</div>
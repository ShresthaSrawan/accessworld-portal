@extends('layouts.master')

@section('title','Dashboard')

@section('header')
  {{ Html::style('vendor/DataTables/jquery.dataTables.css') }}
@stop

@section('body')
  @include('commons.banner', [ 'banner' => (object)['path' => asset('images/banners/customer-panel-banner.png')] ])
  <section>
    <div class="container">
      <div class="section-body">
        <div class="card tabs-left style-default">
          <ul class="card-head nav nav-tabs text-center" data-toggle="tabs">
            <li class="active">
              <a href="#services" class="loadpage"><i class="fa fa-lg fa-server"></i><br>
                <h4 class="hidden-xs hidden-sm">Services<br>
                </h4>
              </a>
            </li>
            <li>
              <a href="#orderinprogress" class="loadpage"><i class="fa fa-lg fa-history"></i><br>
                <h4 class="hidden-xs hidden-sm">Order in Progress<br>
                </h4>
              </a>
            </li>
            <li>
              <a href="#serviceorders" class="loadpage"><i class="fa fa-lg fa-tags"></i><br>
                <h4 class="hidden-xs hidden-sm">Service Order<br>
                </h4>
              </a>
            </li>
            <li>
              <a href="#myrefers" class="loadpage"><i class="fa fa-lg fa-paper-plane-o"></i><br>
                <h4 class="hidden-xs hidden-sm">Referrals<br>
                </h4>
              </a>
            </li>
            <li>
              <a href="#myaccount" class="loadpage"><i class="fa fa-lg fa-user"></i><br>
                <h4 class="hidden-xs hidden-sm">My Account<br>
                </h4>
              </a>
            </li>
            @if(Auth::user()->is_admin)
              <li>
                <a href="#loginas" class="loadpage"><i class="fa fa-lg fa-users"></i><br>
                  <h4 class="hidden-xs hidden-sm">Login As<br>
                  </h4>
                </a>
              </li>
            @endif
          </ul>
          <div class="card-body tab-content style-default-bright no-padding">
            <div class="tab-pane active" id="services"></div>
            <div class="tab-pane" id="orderinprogress"></div>
            <div class="tab-pane" id="serviceorders"></div>
            <div class="tab-pane" id="myrefers"></div>
            <div class="tab-pane" id="myaccount"></div>
            @if(Auth::user()->is_admin)
              <div class="tab-pane" id="loginas"></div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('footer')
  <script>
    window.subpageurl = '{{ route("customer.subpage") }}';
  </script>
  {{ Html::script('assets/js/customer.panel.js') }}
  {{ Html::script('vendor/DataTables/jquery.dataTables.min.js') }}
@stop

@extends('layouts.master')

@section('title','Contact')

@section('meta:description', $contactPage->short_description)
@section('og:title', 'Contact Information')
@section('og:description', $contactPage->short_description)
@section('og:image', asset($contactPage->image->path))
@section('og:width', '720')

@section('body')

  @include('commons.banner', [ 'banner' => $contactPage->image] )

  <section class="section-shadow">
    <div class="container">
      <div class="row">
        <div class="col-sm-9">
          @include('contacts.form')
        </div>
        <div class="hbox-column col-md-3 style-danger animated fadeInRight">
          <div class="row">
            <div class="col-xs-12">
              <h4>Contact info</h4>
              <br/>
              <dl class="dl-horizontal dl-icon">
                <dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
                <dd>
                  <span class="opacity-50">Phone</span><br/>
                  <span class="text-medium">{{ display_contact('phone')}}</span> &nbsp;<span class="opacity-50">mobile</span><br/>
                </dd>
                <dt><span class="fa fa-fw fa-envelope-square fa-lg opacity-50"></span></dt>
                <dd>
                  <span class="opacity-50">Email</span><br/>
                  <a class="text-medium" href="mailto:{{ display_contact('email') }}">{{ display_contact('email') }}</a>
                </dd>
                <dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
                <dd>
                  <span class="opacity-50">Address</span><br/>
                  <span class="text-medium">
                    PO Box 345678<br/>
                    {{ display_contact('address') }}<br/>
                    {{ display_contact('state') }}
                  </span>
                </dd>
                <dd class="full-width"><div id="map-canvas" class="border-white border-xl height-5"></div></dd>
              </dl>
            </div><!--end .col -->
          </div><!--end .row -->
        </div>
      </div>
    </div>
  </section>

@stop

@section('footer')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFyAOEFCLP24pUZsma0pOIsIierKIBtcs"></script>
  {{ Html::script('vendor/gmaps/gmaps.js') }}
  <script>
    (function(namespace, $) {
      "use strict";

      var GoogleMaps = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
          o.initialize();
        });

      };
      var p = GoogleMaps.prototype;

      // =========================================================================
      // MEMBERS
      // =========================================================================

      p.map = null;

      // =========================================================================
      // INIT
      // =========================================================================

      p.initialize = function() {
        this._initGMaps();
      };

      // =========================================================================
      // GMaps
      // =========================================================================

      p._initGMaps = function() {
        if (typeof GMaps === 'undefined') {
          return;
        }
        if ($('#map-canvas').length === 0) {
          return;
        }

        this.map = new GMaps({
          div: '#map-canvas',
          lat: 27.679517,
          lng: 85.319541,
          zoom: 16,
          disableDefaultUI: true
        });

        this.map.addMarker({
          lat: 27.679517,
          lng: 85.319541,
          title: 'AccessWorld'
        });
      };
      p._addMarker = function(results, status) {
        this.map.removeMarkers();
        var latlng = results[0].geometry.location;
        this.map.setCenter(latlng.lat(), latlng.lng());
        this.map.addMarker({
          lat: latlng.lat(),
          lng: latlng.lng()
        });
      };

      // =========================================================================
      namespace.GoogleMaps = new GoogleMaps;
    }(this.materialadmin, jQuery)); // pass in (namespace, jQuery):

    $(document).ready(function() {
      $('.btn-submit').click(function(){
        var form = $('.form-feedback');
        if(form.valid()){
          if(grecaptcha.getResponse()!=""){
            form.submit();
          } else {
            $('#captcha-error').removeClass('hidden');
          }
        }
      });
    });
  </script>
@stop
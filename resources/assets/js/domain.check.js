(function (namespace, $) {
  "use strict";

  var DomainCheck = function() {
    // Create reference to this instance
    var o = this;
    // Initialize app when document is ready
    $(document).ready(function() {
      o.initialize();
    });
  };

  var p = DomainCheck.prototype;

  // =========================================================================
  // INIT
  // =========================================================================

  p.initialize = function() {
    var o = this;

    $('#btn-domain-check').on('click', function() { 
      o._domainCheck();
    });

    $('.form').keypress(function(e) { 
      if(e.which == 13) { 
        o._domainCheck();
      } 
    });
  };

  p._domainCheck = function () {
    if(!$('.form').valid()) return;

    var o =this;

    if($('#domain_name').val()){

      materialadmin.AppCard.addCardLoader( $( '#tldList' ) );
      materialadmin.AppCard.addCardLoader( $( '#domainAvailability' ) );
      materialadmin.AppCard.addCardLoader( $( '#domainInputForm' ) );
      materialadmin.AppCard.addCardLoader( $( '#nameSuggestList' ) );

      $.ajax( {

        'url': $('#btn-domain-check').data('source'),
        'type': 'POST',
        'data': { 'domain' : $('#domain_name').val() },

        success: function ( response ) {

          $('#domainAvailability').removeClass('hidden').html(response);

          materialadmin.AppCard.removeCardLoader( $( '#tldList' ) );
          materialadmin.AppCard.removeCardLoader( $( '#domainAvailability' ) );
          materialadmin.AppCard.removeCardLoader( $( '#domainInputForm' ) );

          o._nameSuggest();
          $(window).trigger('resize').trigger('scroll');
        },

        error: function ( response ) {
          materialadmin.AppCard.removeCardLoader( $( '#tldList' ) );
          materialadmin.AppCard.removeCardLoader( $( '#domainAvailability' ) );
          materialadmin.AppCard.removeCardLoader( $( '#domainInputForm' ) );
          materialadmin.AppCard.removeCardLoader( $( '#nameSuggestList' ) );
        }
      } );
    }
  };

  p._nameSuggest = function () {
    if(! $('.form').valid()) return;

    var o = this, tld = new Array();

    if($('input[type="checkbox"]').length) {
      $('input[type="checkbox"]:checked').each(function() {
        tld.push($(this).val());
      });
    }

    if(! $('#nameSuggestList').length) {
      materialadmin.AppCard.addCardLoader( $( '#nameSuggest' ) );
    }

    if($('#domain_name').val()){

      materialadmin.AppCard.addCardLoader( $( '#tldList' ) );

      $.ajax( {

        'url': $('#btn-domain-check').data('name-suggest'),
        'type': 'POST',
        'data': { 'domain' : $('#domain_name').val(), 'tld' : tld },

        success: function ( response ) {
          $('#nameSuggest').html(response);
          materialadmin.AppCard.removeCardLoader( $( '#domainInputForm' ) );
          materialadmin.AppCard.removeCardLoader( $( '#tldList' ) );
          materialadmin.AppCard.removeCardLoader( $( '#nameSuggestList' ) );
          materialadmin.AppCard.removeCardLoader( $( '#nameSuggest' ) );

          $(window).trigger('resize').trigger('scroll');
          $('.tld-checkbox').on('change', function() {
            materialadmin.AppCard.addCardLoader( $( '#domainInputForm' ) );
            o._nameSuggest();
          });
        },

        error: function ( response ) {
          materialadmin.AppCard.removeCardLoader( $( '#domainInputForm' ) );
          materialadmin.AppCard.removeCardLoader( $( '#tldList' ) );
          materialadmin.AppCard.removeCardLoader( $( '#nameSuggest' ) );
          materialadmin.AppCard.removeCardLoader( $( '#nameSuggestList' ) );
        }
      } );
    }
  }

  window.materialadmin.DomainCheck = new DomainCheck;
})(this.materialadmin, jQuery);
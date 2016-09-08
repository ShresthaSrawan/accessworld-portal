(function () {
  "use strict";

  var SslCertificate = function() {
    // Create reference to this instance
    var o = this;
    // Initialize app when document is ready
    $(document).ready(function() {
      o.initialize();
    });
  };

  var p = SslCertificate.prototype;

  // =========================================================================
  // INIT
  // =========================================================================

  p.initialize = function() {
    //Display Product Type
    this._displayProductType();

    $('#supplierList').trigger('change');

    $('#formSslCertificate').on('submit', function () {
      $('select[id*=ProductTypeList].hidden').remove();
    });
  };

  p._displayProductType = function() {
    var q = this, provider;

    $('#supplierList').on('change', function() {
      //Selected Provider
      provider = $(this).find(":selected").val();

      //Hide All ProductTypes
      $('select[id*=ProductTypeList]').addClass('hidden');
      //Show selected ProductTypes
      $('#'+provider+'ProductTypeList').removeClass('hidden');
    });

    $('select[id*=ProductTypeList]').on('change', function() {
      var $el = $(this).find(":selected");
      q._productTypeInfo($el);
    });
  };

  p._productTypeInfo = function(el) {
    //Selected productType
    var productType = $(el).val();

    if(productType == ""){
      $('#productTypeInfo').addClass('hidden');
      $(window).trigger('resize').trigger('scroll');
    } else {
      $.ajax({
        'url': $('#productTypeInfo').data('source'),
        'type': 'POST',
        'data': { 'slug' : productType },
        success: function (response) {
          $('#productTypeInfo').html(response).removeClass('hidden');
          $(window).trigger('resize').trigger('scroll');
        },
        error: function (response) {
          $('#productTypeInfo').html(response).removeClass('hidden');
        }
      });
    }

  }

  SslCertificate = new SslCertificate;
})();
//# sourceMappingURL=ssl.info.js.map

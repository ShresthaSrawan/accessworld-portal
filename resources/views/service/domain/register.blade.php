@extends('layouts.master')

@section('title', 'Domain Register')

@section('header')
@stop

@section('body')
  <section>
    <div class="container">
      <div class="card">
        <div class="card-body">
          {{ Form::open( [ 'route' => 'service.domain.store', 'class' => 'form form-validate', 'novalidate', 'id' => 'domain_register_form' ] ) }}
          @include('services.domain.partials.form')
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </section>
@stop

@section('footer')
  <script type="text/javascript">
    $(document).ready(function () {

      $('.copyVal').change(function () {
        if ($(this).val() == "") return;
        destination = $('.' + $(this).data('to'));
        $('.' + $(this).val()).each(function (k, v) {
          $(destination[k]).val($(this).val()).trigger('change');
        });
      });

      function refresh() {
        var nameserver = $(':radio[name="nameserver_provider"]').filter(':checked').val();
        if (nameserver == 1) {
          $('.nameserver1').val('ns1.accessworld.net').attr('readonly', true);
          $('.nameserver2').val('ns2.accessworld.net').attr('readonly', true);
        } else if (nameserver == 2) {
          $('.nameserver1').val('').attr('readonly', false);
          $('.nameserver2').val('').attr('readonly', false);
        }
      }

      function copyValuesToContactSets () {
        var contact_field_sets = [ 'owner', 'administrator', 'billing', 'technical' ];
        $(contact_field_sets).each(function (k, v) {
          destination = $('.' + v);
          $('.oabt').each(function (index, value) {
            $(destination[index]).val($(this).val()).trigger('change');
          });
        });
      }

      $("#is_different").on("change", function() {
        if($(this).is(":checked")){
          $(".contact-form-different").removeClass("hidden");
          $(".contact-form-oabt").addClass("hidden");
        } else {
          $(".contact-form-different").addClass("hidden");
          $(".contact-form-oabt").removeClass("hidden");
        }
      });

      $("#domain_register_form").submit( function (event) {
        if( ! $("#is_different").is(":checked")) {
          copyValuesToContactSets();
        }
        if($("#domain_register_form").valid())
          return;
        event.preventDefault();
      });

      refresh();
      $(':radio[name="nameserver_provider"]').change(refresh);
      $("#is_different").trigger("change");
    });
  </script>
@stop

@extends('layouts.master')

@section('title', 'Register')

@section('header')
@stop

@section('body')
  <section class="section-shadow">
    <div class="container">
      <div class="section-body">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">
          <div class="card">
            <div class="card-head">
              <header><h1>Register</h1><br/>
              <span class="text-default-light text-light text-sm text-justify">Thank you for choosing AccessWorld. You can now facilitate yourself with valuable services of AccessWorld.</span></header><br/>
            </div>
            <form action="{{ url('register') }}" method="POST" class="form form-validate" id="registerForm" role="form" novalidate>
              {{ csrf_field() }}
              @include('auth.form')
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('footer')
  <script>
    var uniqueCustomer = "{{ route('api.unique.customer') }}";
  </script>
  {{ Html::script('assets/js/customer.register.js') }}
@stop

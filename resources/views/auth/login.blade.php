@extends('layouts.master')

@section('title','Login | Registration')

@section('header')
@stop

@section('body')
  <section class="section-shadow">
    <div class="container">
      <div class="section-body">
      <div class="row">
        <div class="col-sm-6 fadeInUp animated">
          <h1>Get the best <strong>Cloud Service</strong> you can get</h1>
          <div>
            <p>
              {!!site_info('login_info')!!}
            </p>
            <div class="text-center text-primary">
              <a href="#privacy-policy" data-toggle="modal">Privacy Policy</a> -
              <a href="#terms_and_condition" data-toggle="modal">Terms & Conditions</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 fadeInUp animated">
          <div class="card">
            <div class="card-head">
              <header><h1>Login</h1></header>
            </div>
            <div class="card-body">
              @include('commons.alerts')
              <form role="form" action="{{ url('login') }}" method="POST" class="form form-validate" novalidate>
                {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="login" placeholder="Username or Email..." class="form-control" required>
                  <label for="login">Username/Email</label>
                </div>
                <div class="form-group">
                  <input type="password" name="password" placeholder="Password..." class="form-control" required>
                  <label for="password">Password</label>
                  <p class="help-block"><a href="#password-reset" data-toggle="modal">Forgotten?</a></p>
                </div>
                <br/>
                <div class="row">
                  <div class="col-xs-6 text-left">
                    <div class="checkbox checkbox-inline checkbox-styled">
                      <label>
                        <input type="checkbox" name="remember"> <span>Remember me</span>
                      </label>
                    </div>
                  </div><!--end .col -->
                  <div class="col-xs-6 text-right">
                    <button class="btn btn-accent btn-raised" type="submit">Login</button>
                  </div><!--end .col -->
                </div>
              </form>
            </div>
            <div class="card-actionbar style-gray-bright">
              <div class="text-center text-default-bright">
                <h3>Or <a href="{{ url('register') }}" class="text-accent">Sign up</a></h3>
                <p>It only takes a momemt.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>
  <div class="modal fade" id="password-reset" tabindex="-1" role="dialog" aria-labelledby="password-reset-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ url('/password/email') }}" class="form form-validate" novalidate role="form">
          {!! csrf_field() !!}
          <div class="modal-header border-transparent">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Password Reset</h4>
            <em>To reset your password via the email address associated with your account, please input your email in the form and click on the "Send Email" button.</em>
          </div>
          <div class="modal-body">
            <div class="form-group floating-label">
              <input type="email" name="email" class="form-control" id="reset-email" required>
              <label for="reset-email">Email</label>
            </div>
          </div>
          <div class="modal-footer border-transparent">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning">Send Email</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="privacy-policy" tabindex="-1" role="dialog" aria-labelledby="privacy-policy-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-transparent">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Privacy Policy</h4>
          <em>
            {{ site_info('privacy_policy') }}
          </em>
        </div>
        <div class="modal-footer border-transparent">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="terms_and_condition" tabindex="-1" role="dialog" aria-labelledby="terms_and_condition-label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-transparent">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Terms and Conditions</h4>
          <em>
            {{ site_info('terms_and_conditions') }}
          </em>
        </div>
        <div class="modal-footer border-transparent">
          <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
        </div>
      </div>
    </div>
  </div>
@stop

@section('footer')
@stop
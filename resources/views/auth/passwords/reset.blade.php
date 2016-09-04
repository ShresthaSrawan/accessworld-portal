@extends('layouts.master')

@section('title', 'Password Reset')

@section('body')
<section id="loginRegistration" class="margin-top-1">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text wow fadeInLeftBig animated">
          <div class="card">
            <div class="card-head">
              <header>Reset Password</header>
            </div>

            <form class="form-horizontal form-validate password-validate" role="form" method="POST" action="{{ url('/password/reset') }}" novalidate>
              <div class="card-body">
                {!! csrf_field() !!}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">E-Mail Address</label>

                  <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ $email or old('email') }}" readonly>

                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">Password</label>

                  <div class="col-md-6">
                    <input type="password" class="form-control" name="password" id="register-password">
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                  <label class="col-md-4 control-label">Confirm Password</label>
                  <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">
                  </div>
                </div>
              </div>
              <div class="card-actionbar">
                <div class="card-actionbar-row">
                  <button type="submit" class="btn btn-primary ink-reaction"><i class="fa fa-btn fa-refresh fa-fw"></i>&nbsp;Reset Password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection

@section('footer')
  {{ Html::script('assets/js/password.validation.js') }}
@stop

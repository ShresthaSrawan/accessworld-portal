<div class="card-body">
  <div class="form-group">
    <input type="text" name="username" placeholder="Username..." class="form-control" id="register-username" value="{{ old('username') }}" required>
    <label for="register-username">Username</label>
  </div>
  <div class="form-group">
    <input type="email" name="email" placeholder="Email..." class="form-control" id="register-email" value="{{ old('email') }}" required>
    <label for="register-email">Email</label>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <input type="password" name="password" placeholder="Password..." class="form-control" id="register-password" required>
        <label for="register-password">Password</label>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <input type="password" name="password_confirmation" placeholder="Repeat Password..." class="form-control" required>
        <label for="register-password">Repeat Password</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <input type="text" name="detail[first_name]" placeholder="First Name..." class="form-control" id="register-first-name" value="{{ old("detail['first_name']") }}" required>
        <label for="register-first-name">First Name</label>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <input type="text" name="detail[last_name]" placeholder="Last Name..." class="form-control" id="register-last-name" value="{{ old("detail['last_name']") }}" required>
        <label for="register-last-name">Last Name</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <input type="number" name="detail[phone]" placeholder="Phone..." class="form-control" id="register-phone" value="{{ old("detail['phone']") }}" required>
        <label for="register-phone">Phone</label>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <input type="text" name="detail[address]" placeholder="Address..." class="form-control" id="register-address" value="{{ old("detail['address']") }}">
        <label for="register-address">Address</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <input type="text" name="detail[company_name]" placeholder="Company..." class="form-control" id="register-company" value="{{ old("detail['company_name']") }}">
    <label for="register-company">Company</label>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group has-error">
        {!! Recaptcha::render() !!}
        <span id="captcha-error" class="hidden text-danger">Captcha required.</span>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="row padding-1">
        <div class="col-sm-12">
          <small><em>By clicking Sign Up, you agree to our <a href="#">Terms</a> and that you have read our <a href="#">Data Policy</a>, including our <a href="#">Cookie Use</a>.</em></small>
        </div>
        <div class="col-sm-12">
          <button type="button" class="btn btn-accent pull-right ink-reaction" id="btn-signup">Sign me up!</button>
        </div>
      </div>
    </div>
  </div>
</div>
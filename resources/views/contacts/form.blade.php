<form action="{{ route('feedback.send') }}" method="post" class="form form-validate form-feedback" role="form" novalidate data-captcha="true">
    {{ csrf_field() }}
    <div class="card">
        <div class="card-head">
        <header>Contact Us</header>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input type="text" name="name" value="{{ isset($name) ? $name:'' }}" class="form-control" required>
                <label>Name</label>
            </div>
            <div class="form-group">
                <input type="email" name="email" value="{{ isset($email) ? $email:'' }}" class="form-control" required>
                <label>Email</label>
            </div>
            <div class="form-group">
                <input type="text" name="subject" value="{{ isset($subject) ? $subject:'' }}" class="form-control" required>
                <label>Subject</label>
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" required rows="6">{{ isset($message) ? $message:'' }}</textarea>
                <label>Message</label>
            </div>
            <div class="form-group has-error">
                {!! Recaptcha::render() !!}
                <span id="captcha-error" class="hidden text-danger">Captcha required.</span>
            </div>
        </div>
        <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="button" class="btn btn-submit btn-accent ink-reaction">Send</button>
        </div>
        </div>
    </div>
</form>
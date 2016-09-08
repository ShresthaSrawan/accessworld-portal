<header>
    <h3>Make a Referral</h3>
    <p class="text-caption">You can make referral to your friends and colleagues here. Enter their detail and claim your referral at any time</p>
</header>
<section>
    {{ Form::open(['route' => 'referral.store', 'method' => 'POST', 'class' => 'form', 'role' => 'form' ]) }}
    <div class="form-group">
        {{ Form::text('referred_customer_name', old('referred_customer_name'), [ 'class' => 'form-control', 'required' ]) }}
        {{ Form::label('referred_customer_name', 'Name') }}
    </div>
    <div class="form-group">
        {{ Form::text('referred_customer_org', old('referred_customer_org'), [ 'class' => 'form-control' ]) }}
        {{ Form::label('referred_customer_org', 'Organization Name') }}
    </div>
    <div class="form-group">
        {{ Form::email('referred_customer_email', old('referred_customer_email'), [ 'class' => 'form-control', 'required' ]) }}
        {{ Form::label('referred_customer_email', 'Email') }}
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('referred_customer_phone_1', old('referred_customer_phone_1'), [ 'class' => 'form-control', 'placeholder' => 'Mob.', 'required' ]) }}
                {{ Form::label('referred_customer_phone_1', 'Phone 1') }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::text('referred_customer_phone_2', old('referred_customer_phone_2'), [ 'class' => 'form-control', 'placeholder' => 'H.' ]) }}
                {{ Form::label('referred_customer_phone_1', 'Phone 2') }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::text('referred_customer_address', old('referred_customer_address'), [ 'class' => 'form-control' ]) }}
        {{ Form::label('referred_customer_address', 'Address') }}
    </div>
    <div class="form-group">
        {{ Form::text('referred_customer_website', old('referred_customer_website'), [ 'class' => 'form-control' ]) }}
        {{ Form::label('referred_customer_website', 'Website') }}
    </div>
    <div class="form-group">
        {{ Form::label('service_ids', 'Service') }}
        <br />
        @foreach($services as $service)
            <div class="checkbox checkbox-styled">
                <label>
                    <input type="checkbox" value="{{ $service->id }}" name="service_ids[]">
                    <span>{{ $service->name }}</span>
                </label>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        {{ Form::textarea('comment', old('comment'), [ 'class' => 'form-control', 'rows' => 5 ]) }}
        {{ Form::label('comment', 'Comment') }}
    </div>
    <div class="card-actionbar-row">
        <button type="submit" class="btn btn-flat btn-primary ink-reaction">Refer</button>
    </div>
    {{ Form::close() }}
</section>
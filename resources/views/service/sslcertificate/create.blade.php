@extends('layouts.master')

@section('title', ' | '.$service->name)

@section('body')
  <section>
    <div class="container" class="margin-top-1">
      @include('commons.alerts')
      {{ Form::open(['route' => ['service.ssl.cart', $productType->slug], 'class' => 'form form-validate', 'role' => 'form', 'novalidate']) }}
        <div class="card">
          <div class="card-head">
            <header>
              <h1>{{ $productType->name }} {{ empty($domain) ? '' : '('.$domain.')' }}</h1>
            </header>
          </div>
          <div class="card-body">
            <h2>Service Period & Validation Period</h2>
            <div class="row">
              <div class="col-sm-{{ $productType->provider->serverTypes->isEmpty() ? '6' : '4' }}">
                <div class="form-group">
                  <select class="form-control" name="qty">
                    @for($i = 1; $i <= $productType->term; $i++)
                      <option value="{{ $i }}">{{ $i.' Year - '.get_local_currency_prefix().' '.get_opensrs_price($productType->price, true, true) * $i }}</option>
                    @endfor
                  </select>
                  <label for="qty">Certification Period</label>
                </div>
              </div>
              <div class="col-sm-{{ $productType->provider->serverTypes->isEmpty() ? '6' : '4' }}">
                <div class="form-group">
                  <?php
                    /* Approver email array gen */
                    $prefixes = ['admin','webmaster','administrator','hostmaster','webmaster','postmaster'];

                    foreach($prefixes as $prefix) {
                      $generic_approver_emails[$prefix.'@'.$cleanDomain] = $prefix.'@'.$cleanDomain;
                    }
                  ?>
                  {{ Form::select('options[approver_email]', $generic_approver_emails, old('options.approver_email'), ['class' => 'form-control', 'required']) }}
                  {{ Form::label('options[approver_email]', 'Approver Email') }}
                  <p class="help-block">
                    {{ 'eg: admin@yourdomain.com' }}
                  </p>
                </div>
              </div> 
              @unless($productType->provider->serverTypes->isEmpty())
                <div class="col-sm-4">
                  <div class="form-group">
                    {{ Form::select('options[server_type]', $productType->provider->serverTypes->lists('name', 'slug'), old('options.server_type'), ['class' => 'form-control', 'required']) }}
                    {{ Form::label('options[server_type]', 'Server Type') }}
                  </div>
                </div>
              @endif
            </div>
            <div class="row"> 
              @foreach($contactSet = explode(',', $productType->contact_set) as $set)
                @if(count($contactSet) == 1)
                <div class="col-sm-6 col-sm-offset-3">
                @elseif(count($contactSet) == 2)
                <div class="col-sm-6">
                @elseif(count($contactSet) == 3)
                <div class="col-sm-4">
                @else
                <div class="col-sm-3">
                @endif
                  <h3>{{ ucwords($set).' Contact Information' }}</h3>
                  <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.'.$set.'.first_name') }}"
                      title="{{ $set }} first_name" name="options[{{ $set }}][first_name]"
                      class="form-control {{ $set }} first_name" maxlength="64">
                    <label>First Name</label>
                  </div>
                  <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.'.$set.'.last_name') }}"
                      title="{{ $set }} last_name" name="options[{{ $set }}][last_name]"
                      class="form-control {{ $set }} last_name" maxlength="64">
                    <label>Last Name</label>
                  </div>
                  @if($set == 'organization')
                    <div class="form-group">
                      <input type="text" required="required" value="{{ old('options.'.$set.'.org_name') }}"
                        title="{{ $set }} org_name" name="options[{{ $set }}][org_name]"
                        class="form-control {{ $set }} org_name" maxlength="64">
                      <label>Organization Name</label>
                    </div>
                  @endif
                  <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.'.$set.'.address1') }}"
                      title="{{ $set }} address1" name="options[{{ $set }}][address1]"
                      class="form-control {{ $set }} address1" maxlength="100">
                    <label>Address 1</label>
                  </div>
                  <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.'.$set.'.city') }}" 
                      title="{{ $set }} city" name="options[{{ $set }}][city]" 
                      class="form-control {{ $set }} city" maxlength="64">
                    <label>City</label>
                  </div>
                  <div class="form-group">
                    <div>{{ Form::select('options['.$set.'][country]', $countries, old('options.'.$set.'.country'), ['class' => 'form-control '.$set.' country', 'required']) }}</div>
                    <label>Country</label>
                  </div>
                  <div class="form-group">
                    <div>
                      <input type="text" value="{{ old('options.'.$set.'.state') }}" title="{{ $set }} state"
                        name="options[{{ $set }}][state]"
                        class="form-control {{ $set }} state" maxlength="64" required>
                      <label>State</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.'.$set.'.postal_code') }}"
                      title="{{ $set }} postal_code" name="options[{{ $set }}][postal_code]"
                      class="form-control {{ $set }} postal_code" maxlength="32">
                    <label>Zip/Postal Code</label>
                  </div>
                  <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.'.$set.'.phone') }}" 
                      title="{{ $set }} phone" name="options[{{ $set }}][phone]" 
                      class="form-control {{ $set }} phone" maxlength="20">
                    <label>Phone</label>
                  </div>
                  <div class="form-group">
                    <input type="email" value="{{ old('options.'.$set.'.email') }}" title="{{ $set }} email"
                      name="options[{{ $set }}][email]" class="form-control {{ $set }} email"
                      maxlength="255" required>
                    <label>Email</label>
                  </div>
                </div>
              @endforeach
            </div>
            <div class="form-group"> 
              {{ Form::textarea('options[csr]', old('options.csr'), ['class' => 'form-control', 'required']) }}
              {{ Form::label('options[csr]', 'CSR (Certificate Signing Request)') }}
              <p class="help-block">Go here to generate a CSR online: 
                <a href="https://www.digicert.com/csr-creation.htm" target="_blank" class="text-primary">https://www.digicert.com/csr-creation.htm</a>
              </p>
            </div>
          </div>
          <div class="card-actionbar">
            <div class="card-actionbar-row">
              <button type="submit" class="btn btn-accent ink-reaction">Add to cart</button>
            </div>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  </section>
@stop

@section('footer')
@stop
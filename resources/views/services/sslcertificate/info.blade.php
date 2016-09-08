<div class="col-sm-12">
  <div class="row">
    <div class="col-sm-6">
      <dl>
        <dt>{{ $productType->name }} Details</dt>
        @foreach(explode(',', $productType->contact_set) as $set)
          <dd>{{ ucwords($set) }} Vetted</dd>
        @endforeach
        <dd>{{ $productType->term }} Year Maximum Period</dd>
      </dl>
    </div>
    <div class="col-sm-6">
      <dl>
        <dt>Price</dt>
        @for($i = 1; $i <= $productType->term; $i++)
          <dd>{{ $i.' Year:'}} {{ get_local_currency_prefix(). ' ' .get_opensrs_price($productType->price, true, true) * $i }}</dd>
        @endfor
      </dl>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <input class="form-control" name="domain" required>
        <label for="domain">Please enter the domain name in order to proceed</label>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group force-padding">
        <button class="btn btn-primary ink-reaction pull-right" type="submit"><i class="fa fa-arrow-right"></i> Continue to Next Step</button>
      </div>
    </div>
  </div>
</div>
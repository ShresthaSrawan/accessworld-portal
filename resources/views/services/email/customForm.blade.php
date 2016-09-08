<div class="card-body">
  <a href="javascript:void(0);" class="btn btn-primary btn-raised service-price btn-custom-price static"></a>

  <div class="form-group no-padding">
    <span class="text-medium text-lg">Domain</span>
    {{ Form::text("options[domain]", old('options.domain'), [ 'class' => 'priceable range-slider email-domain-slider' ] ) }}
  </div>
  <div class="form-group no-padding">
    <span class="text-medium text-lg">Disk</span>
    {{ Form::text("options[disk]", isset($item) && isset($item['options']['disk']) ? $item['options']['disk'] : 10, [ 'class' => 'priceable range-slider email-disk-slider' ] ) }}
  </div>
  <div class="form-group no-padding">
    <span class="text-medium text-lg">Traffic</span>
    {{ Form::text("options[traffic]", isset($item) && isset($item['options']['traffic']) ? $item['options']['traffic'] : 10, [ 'class' => 'priceable range-slider email-traffic-slider' ] ) }}
  </div>
  <div class="row">
    <div class="col-sm-8 col-xs-12">
      @include('partials.terms')
    </div>
    <div class="col-sm-4 col-xs-12">
      <div class="form-group">
        {{ Form::text('name', old('name'), [ 'class' =>'form-control', 'required' ]) }}
        <label>Name</label>
      </div>
    </div>
  </div>
  <p class="text-caption no-margin">{{ help_text('order_term') }}</p>
  @if($offer = has_offer('email'))
    <p class="text-caption no-margin">
      {{ $offer->discount_percent}}% amount will be deducted from the above price as a part of {{ $offer->name }}
    </p>
  @endif
</div>
<div class="card-actionbar">
  <div class="card-actionbar-row">
    <button type="submit" class="btn btn-accent ink-reaction">Add to cart</button>
  </div>
</div>
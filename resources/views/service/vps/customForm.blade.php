<div class="card-body">
  <a href="javascript:void(0);" class="btn btn-primary btn-raised service-price btn-custom-price static"></a>

  <div class="form-group no-padding">
    <span class="text-medium text-lg">CPU</span>
    {{ Form::text("options[cpu]", old('options.cpu'), [ 'class' => 'priceable range-slider vps-cpu-slider' ] ) }}
  </div>
  <div class="form-group no-padding">
    <span class="text-medium text-lg">RAM</span>
    {{ Form::text("options[ram]", old('options.ram'), [ 'class' => 'priceable range-slider vps-ram-slider' ] ) }}
  </div>
  <div class="form-group no-padding">
    <span class="text-medium text-lg">Disk</span>
    {{ Form::text("options[disk]", old('options.disk'), [ 'class' => 'priceable range-slider vps-disk-slider' ] ) }}
  </div>
  <div class="form-group no-padding">
    <span class="text-medium text-lg">Traffic</span>
    {{ Form::text("options[traffic]", old('options.traffic'), [ 'class' => 'priceable range-slider vps-traffic-slider' ] ) }}
  </div>

  <div class="row">
    <div class="col-sm-3 col-xs-12">
      <div class="form-group">
        {{ Form::label('is_managed', 'Managed') }}
        {{ Form::select('options[is_managed]', ['No', 'Yes'], old('options.is_managed'), ['class' => 'form-control priceable', 'id'=>'is_managed']) }}
      </div>
    </div>
    <div class="col-sm-3 col-xs-12">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-content">
            {{ Form::select('options[data_center_id]', $dataCenters->lists('name', 'id'), old('options.data_center_id'), ['class'=>'form-control priceable','id'=>'dataCenters']) }}
            <label for="dataCenter">Data Center</label>
          </div>
          <span class="input-group-addon">
            @foreach($dataCenters as $dataCenter)
              <img src="{{ asset($dataCenter->country->image->path) }}" class="hidden dc-country-flag" id="dcCountryFlag{{ $dataCenter->id }}">
            @endforeach
          </span>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-xs-12">
      <div class="form-group">
        {{ Form::label('operating_system', 'Operating System') }}
        {{ Form::select('options[operating_system_id]', $operatingSystems, old('options.operating_system_id'), ['class' => 'form-control priceable', 'operating_system']) }}
      </div>
    </div>
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
  @if($offer = has_offer('vps'))
    <p class="text-lg">
      <i>Discount as per <b>{{ $offer->name }}</b> applied.</i>
    </p>
  @endif
  <p class="text-caption no-margin">
    {{ help_text('order_term') }}
  </p>
</div>
<div class="card-actionbar">
  <div class="card-actionbar-row">
    <button type="submit" class="btn btn-accent ink-reaction">Add to cart</button>
  </div>
</div>
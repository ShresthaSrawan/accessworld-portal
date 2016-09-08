<div class="card">
    <div class="card-body">
        <div class="form-group">
            {{ Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'name', 'required' ]) }}
            <label for="name">Name*</label>
        </div>
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="cpu" value="{{ $vpsPackage->cpu }} Core" readonly>
                    <label for="cpu">CPU</label>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="ram" value="{{ $vpsPackage->ram }} GB" readonly>
                    <label for="ram">RAM</label>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="disk" value="{{ $vpsPackage->disk }} GB" readonly>
                    <label for="disk">Storage</label>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="traffic" value="{{ $vpsPackage->traffic }} GB" readonly>
                    <label for="traffic">Traffic</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                    {{ Form::select('options[is_managed]', [ 0=>'No', 1=>'Yes'], old('options.is_managed'), ['class'=>'form-control priceable']) }}
                    <label for="managed">Managed</label>
                </div>
            </div>
            <div class="col-sm-3 col-xs-12">
                <div class="form-group">
                    {{ Form::select('options[operating_system_id]', $operatingSystems, old('options.operating_system_id'), ['class'=>'form-control priceable']) }}
                    <label for="operatingSystem">Operating System</label>
                </div>
            </div>
            <div class="col-sm-6 col-xs-12">
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
        </div>
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                @include('partials.terms')
            </div>
            <div class="col-sm-4 col-xs-12">
                <p class="text-xxl price-wrap"></p>
            </div>
        </div>
        <p class="text-caption no-margin text-right">
            {!! help_text('order_term') !!}
        </p>
    </div><!--end .card-body -->
    <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="submit" class="btn btn-accent ink-reaction">Add to cart</button>
        </div>
    </div>
</div>
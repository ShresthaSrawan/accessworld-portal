<div class="custom-service-form">
    <a href="#" class="btn btn-primary btn-lg service-price btn-custom-price static"></a>
    <div class="custom-slider-group">
        <div class="row">
            <label class="control-label col-sm-12">CPU</label>
            <div class="col-sm-12">
                {{ Form::text("options[cpu]", old('options.cpu'), [ 'class' => 'priceable range-slider cpu-slider' ] ) }}
            </div>
        </div>
        <div class="row">
            <label class="control-label col-sm-12">RAM</label>
            <div class="col-sm-12">
                {{ Form::text("options[ram]", old('options.ram'), [ 'class' => 'priceable range-slider ram-slider' ] ) }}
            </div>
        </div>
        <div class="row">
            <label class="control-label col-sm-12">Disk</label>
            <div class="col-sm-12">
                {{ Form::text("options[disk]", old('options.disk'), [ 'class' => 'priceable range-slider disk-slider' ] ) }}
            </div>
        </div>
        <div class="row">
            <label class="control-label col-sm-12">Traffic</label>
            <div class="col-sm-12">
                {{ Form::text("options[traffic]", old('options.traffic'), [ 'class' => 'priceable range-slider traffic-slider' ] ) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            <small><em>13% VAT will be applicable in above amount. Yearly plan have to pay for 10 months.</em></small>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-primary pull-right" type="submit">Submit</button>
        </div>
    </div>
</div>
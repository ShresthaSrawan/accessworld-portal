<div class="card">
    <div class="card-body">
        <div class="form-group">
            {{ Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'name', 'required' ]) }}
            <label for="name">Name*</label>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="domain" value="{{ $webPackage->domain }} Domain(s)" readonly>
                    <label for="domain">Domain</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="disk" value="{{ $webPackage->disk }} GB" readonly>
                    <label for="disk">Storage</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="traffic" value="{{ $webPackage->traffic }} GB" readonly>
                    <label for="traffic">Traffic</label>
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
        <p class="text-caption no-margin text-right">{!! help_text('order_term') !!}</p>
    </div><!--end .card-body -->
    <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="submit" class="btn btn-accent ink-reaction">Add to cart</button>
        </div>
    </div>
</div>
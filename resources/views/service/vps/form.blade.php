<div class="card" id="package-app">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-default-light">Basic Details</h2>
            </div>
        </div>
        <div class="form-group">
            {{ Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'name', 'required' ]) }}
            <label for="name">Name*</label>
        </div>
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="cpu" value="{{ $package->cpu }} Core" readonly>
                    <label for="cpu">CPU</label>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="ram" value="{{ $package->ram }} GB" readonly>
                    <label for="ram">RAM</label>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="disk" value="{{ $package->disk }} GB" readonly>
                    <label for="disk">Storage</label>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="traffic" value="{{ $package->traffic }} GB" readonly>
                    <label for="traffic">Traffic</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-default-light">Choose an Operating System</h2>
            </div>
            @foreach(operatingSystems() as $operatingSystem)
                <div class="col-md-2 col-sm-4">
                    <label>
                        <div class="card ink-reaction"
                             :class='component.operating_system == {{ $operatingSystem->id }} ? "style-primary-bright" : ""'>
                            <div class="card-body">
                                <img src="{{ thumbnail(150, $operatingSystem) }}" class="img-responsive">
                            </div>
                            <div class="card-actionbar text-center">
                                {{ Form::radio('options[operating_system_id]', $operatingSystem->id, null, ['class' => 'hidden', 'v-model' => 'component.operating_system', 'required']) }}
                                <span class="text-lg text-light">
                                        {{ $operatingSystem->name }}
                                    </span>
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-default-light">Choose an DataCenter Region</h2>
            </div>
            @foreach(dataCenters() as $dataCenter)
                <div class="col-md-2 col-sm-4">
                    <label>
                        <div class="card ink-reaction"
                             :class='component.data_center == {{ $dataCenter->id }} ? "style-primary-bright" : ""'>
                            <div class="card-body">
                                <img src="{{ thumbnail(150, $dataCenter) }}" class="img-responsive">
                            </div>
                            <div class="card-actionbar text-center">
                                {{ Form::radio('options[data_center_id]', $dataCenter->id, null, ['class' => 'hidden', 'v-model' => 'component.data_center', 'required']) }}
                                <span class="text-lg text-light">
                                    {{ $dataCenter->name }}
                                </span>
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-default-light">Choose Type of Service</h2>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="radio radio-styled">
                    <label>
                        {{ Form::radio('options[is_managed]', 0, null, ['v-model' => 'component.is_managed', 'required']) }}
                        <span>Unmanaged</span>
                    </label>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="radio radio-styled">
                    <label>
                        {{ Form::radio('options[is_managed]', 1, null, ['v-model' => 'component.is_managed']) }}
                        <span>Managed</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-default-light">Choose Terms</h2>
                <div class="btn-group margin-bottom-1 btn-group-lg">
                    @foreach( site('terms.all') as $key => $term)
                        <label class="btn ink-reaction btn-primary"
                               :class="{ 'active' : component.term == {{ $key }} }">
                            {{ Form::radio('qty', $key, null, ['class' => 'hidden','v-model'=>'component.term', 'required']) }} {{ $term }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <h2 class="text-default-light">Price</h2>
                <p class="text-xxxl"
                   style="margin-top: -17px;margin-left: -2px;"
                   v-show="priceValid">@{{ formattedPrice }}</p>
            </div>
        </div>
        <p class="text-caption no-margin text-right">
            {!! help_text('order_term') !!}
        </p>
    </div><!--end .card-body -->
    <div class="card-actionbar">
        <div class="card-actionbar-row">
            <button type="submit" class="btn btn-accent ink-reaction" :disabled="!priceValid">Add to cart</button>
        </div>
    </div>
</div>

@push('scripts')
{{ Html::script('assets/js/vue.js') }}

<script>

    var vm = new Vue({
        'el': '#package-app',
        data: {
            component: {
                term: '{!! site('terms.default') !!}',
                is_managed: '{!! empty(old('options.is_managed')) ? 0: old('options.is_managed') !!}',
                data_center: '{!! empty(old('options.data_center')) ? '': old('options.data_center') !!}',
                operating_system: '{!! empty(old('options.operating_system_id')) ? '' : old('options.operating_system_id') !!}'
            },
            price: 0,
            prefix: '{!! site('currency') !!}'
        },
        computed: {
            formattedPrice: function () {
                return this.prefix + " " + this.price;
            },
            priceValid: function () {
                return this.price == parseFloat(this.price);
            }
        },
        ready: function () {
            this.getPrice();
        },
        watch: {
            'component.term': 'getPrice',
            'component.is_managed': 'getPrice',
            'component.data_center': 'getPrice',
            'component.operating_system': 'getPrice'
        },
        methods: {
            getPrice: function () {
                var vue = this;
                $.ajax({
                    type: 'GET',
                    data: this.component,
                    url: '{{ route('service.package.price', [$service->slug, $package->slug]) }}',
                    success: function (response) {
                        vue.price = response;
                    }
                })
            }
        }
    });

</script>
@endpush
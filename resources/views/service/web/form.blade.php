<div class="card" id="package-app">
    <div class="card-body">
        <div class="form-group">
            {{ Form::text('name', old('name'), [ 'class' => 'form-control', 'id' => 'name', 'required' ]) }}
            <label for="name">Name*</label>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="domain" value="{{ $package->domain }} Domain(s)" readonly>
                    <label for="domain">Domain</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="disk" value="{{ $package->disk }} GB" readonly>
                    <label for="disk">Storage</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <input type="text" class="form-control" id="traffic" value="{{ $package->traffic }} GB" readonly>
                    <label for="traffic">Traffic</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <div class="text-default-light text-caption no-margin">
                    <label>Terms</label>
                </div>
                <div class="btn-group margin-bottom-1 btn-group-sm">
                    @foreach( site('terms.all') as $key => $term)
                        <label class="btn ink-reaction btn-primary" :class='component.term == {{ $key }} ? "active" : ""'>
                            {{ Form::radio('qty', $key, null, ['v-model'=>'component.term']) }} {{ $term }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <p class="text-xxl" v-show="priceValid">@{{ formattedPrice }}</p>
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

    new Vue({
        'el': '#package-app',
        data: {
            component: {
                term: '{!! site('terms.default') !!}'
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
            'component.term': 'getPrice'
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
{{ Form::open(['route' => ['manageweb.renewPost', $provision->name], 'class' => 'renewForm']) }}
{{--*/ $offer = has_offer('web'); /**--}}
<div class="row text-center">
  <div class="col-xs-12">
    <h2><span class="text-caption">Name</span>{{ $provision->name }}</h2>
  </div>
  <div class="col-sm-12">
    @include('partials.terms')
  </div>
  <div class="col-sm-12">
    <div class="price">
      @foreach($prices as $term => $price)
        <?php $isVisible = $term == $terms['default']; ?>
        <h2 class="web-renew-price{{ $isVisible ? '' : ' hidden' }}" data-term="{{ $term }}">
          <span class="text-lg">{{ get_local_currency_prefix() }}</span>
          @if($offer)
            <span class="text-lg">
              <s>
                {{ $price }}
              </s>
            </span>
            <div class="text-xxl">
              {{ $price - $price * $offer->discount_percent / 100 }}<sup>*</sup>
            </div>
          @else
            <div class="text-xxl">
              {{ $price }}
            </div>
          @endif
        </h2>
      @endforeach
    </div>
  </div>
  <div class="col-sm-12 text-center">{{ Form::submit('Add to Cart', ['class' => 'btn btn-success']) }}</div>
  <div class="col-sm-12">
    <br>
    <div class="text-caption">
      <div>Please select the terms and select submit to add the renew request to the cart.</div>
      <div>* The following prices are excluding VAT.</div>
      @if($offer)
        <div>* {{ $offer->name }}</div>
      @endif
    </div>
  </div>
</div>
{{ Form::close() }}

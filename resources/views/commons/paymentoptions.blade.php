<div class="row payment-options" style="padding-top: 10px;">
    {{--<div class="col-sm-4"><a href="{{ route('cart.checkout', 'visa') }}"><img src="{{ asset('assets/img/visa.png') }}" class="img-responsive"></a></div>
    <div class="col-sm-4"><a href="{{ route('cart.checkout', 'mastercard') }}"><img src="{{ asset('assets/img/mastercard.png') }}" class="img-responsive"></a></div>
    <div class="col-sm-4"><a href="{{ route('cart.checkout', 'maestro') }}"><img src="{{ asset('assets/img/maestro.png') }}" class="img-responsive"></a></div>--}}
    <div class="col-sm-8 col-sm-offset-2 text-center">
        {{-- <div class="col-sm-4 text-center"><a href="{{ route('cart.checkout', 'paypal') }}" class="btn"><img src="{{ asset('assets/img/paypal.png') }}" class="img-responsive"></a></div> --}}
        <a href="{{ route('cart.checkout', 'esewa') }}" class="btn"><img src="{{ asset('assets/img/esewa.png') }}" class="img-responsive"></a>
        <a href="{{ route('cart.checkout', 'awtpay') }}" class="btn"><img src="{{ asset('assets/img/awtpay.png') }}" class="img-responsive"></a>
    </div>
</div>
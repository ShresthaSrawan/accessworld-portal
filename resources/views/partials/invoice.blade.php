<!-- BEGIN INVOICE HEADER -->
<div class="row">
    <div class="col-xs-8">
        <h1 class="text-light"><img src="/assets/img/logo_100x100.png"><strong>AccessWorld Tech</strong></h1>
    </div>
    <div class="col-xs-4 text-right">
        <h1 class="text-light text-default-light">Invoice</h1>
    </div>
</div><!--end .row -->
<!-- END INVOICE HEADER -->

<br/>

<!-- BEGIN INVOICE DESCRIPTION -->
<div class="row">
    <div class="col-xs-4">
        <h4 class="text-light">Prepared by</h4>
        <address>
            <strong>AccessWorld Tech.</strong><br>
            {{ display_contact('address') }}<br>
            <abbr title="Phone">P:</abbr> {{ display_contact('phone') }}
        </address>
    </div><!--end .col -->
    <div class="col-xs-4">
        <h4 class="text-light">Prepared for</h4>
        <address>
            <strong>{{ $invoice->customer->display_name }}</strong><br>
            {{ display($invoice->customer->detail->address, "") }}<br>
            <abbr title="Phone">P:</abbr> {{ display($invoice->customer->detail->phone) }}
        </address>
    </div><!--end .col -->
    <div class="col-xs-4">
        <div class="well">
            <div class="clearfix">
                <div class="pull-left"> INVOICE NO :</div>
                <div class="pull-right"> {{ $invoice->code }} </div>
            </div>
            <div class="clearfix">
                <div class="pull-left"> INVOICE DATE :</div>
                <div class="pull-right"> {{ $invoice->date }} </div>
            </div>
        </div>
    </div><!--end .col -->
</div><!--end .row -->
<!-- END INVOICE DESCRIPTION -->

<br/>

<!-- BEGIN INVOICE PRODUCTS -->
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th style="width:60px" class="text-center">#</th>
                <th class="text-left">NAME</th>
                <th style="width:140px" class="text-right">SERVICE</th>
                <th style="width:140px" class="text-right">TERMS</th>
                <th style="width:240px" class="text-right">PRICE</th>
            </tr>
            </thead>
            <tbody>
            <?php $key = 0; ?>
            @if(!$invoice->orders()->isEmpty())
                @foreach($invoice->orders() as $order)
                    <tr>
                        <td class="text-center">{{ ++$key }}</td>
                        <td>{{ $order->name }}</td>
                        <td class="text-right">{{ class_basename($order) }}</td>
                        <td class="text-right">{{ is_null($order->term) ? $order->duration .' Year(s)' : $order->term . ' Month(s)' }}</td>
                        <td class="text-right">{{ get_local_price(number_format($order->price - $order->discount,2)) }}</td>
                    </tr>
                @endforeach
            @endif
            <tr>
                <td colspan="3" rowspan="3">
                    <h3 class="text-light">Invoice notes</h3>
                    <p>{!!site_info('invoice_info')!!}</p>
                </td>
                <td class="text-right"><strong>Subtotal</strong></td>
                <td class="text-right">{{ get_local_price(number_format($invoice->total - $invoice->vat, 2)) }}</td>
            </tr>
            <tr>
                <td class="text-right hidden-border"><strong>VAT ({{ \App\Models\Invoice::getVat() * 100  }}%)</strong>
                </td>
                <td class="text-right hidden-border">{{ get_local_price(number_format($invoice->vat, 2)) }}</td>
            </tr>
            <tr>
                <td class="text-right"><strong>Total</strong></td>
                <td class="text-right"><strong>{{ get_local_price(number_format($invoice->total, 2)) }}</strong></td>
            </tr>
            </tbody>
        </table>
    </div><!--end .col -->
</div><!--end .row -->
<!-- END INVOICE PRODUCTS -->

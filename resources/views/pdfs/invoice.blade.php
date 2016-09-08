<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style type="text/css">
        .page {
            border: none;
            margin: 0;
            width: auto;
            padding: 0px;
            background-color: white;
            color: black;
        }

        .page .header {
            border-spacing: 0px;
            border-collapse: collapse;
            padding: 0px;
        }

        table {
            empty-cells: show;
        }

        table > thead > tr > th {
            text-align: left;
        }

        .detail {
            border-spacing: 1px;
            padding: 3px;
            margin-bottom: 10px;
        }

        .well {
            padding: 19px;
            margin-bottom: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        }

        .list tr.head td {
            background-color: #eee;
        }

        .list tr.head > td {
            border-bottom: 1px solid black;
        }

        .list {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-collapse: collapse;
            border-spacing: 0px;
            margin-top: 3px;
        }

        tr.list_row td {
            background-color: white;
            border-bottom: 0.7pt dotted #666;
            padding: 3px;
        }

        .list tr.foot td {
            background-color: #eee;
            border-top: 1px solid black;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body class="page">
    <table class="header" style="width: 100%;">
        <tbody>
        <tr>
            <td style="width: 80%; vertical-align: middle;">
                <h1 style="text-align: left; vertical-align: middle;"><img src="data:image/png;base64,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">AccessWorld
                    Tech</h1>
            </td>
            <td style="width: 20%; text-align: right;">
                <h1 style="text-align: right;  vertical-align: middle;">Invoice</h1>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="detail" style="margin: 0px; border-top: none; width: 100%;">
        <thead>
            <tr>
                <th>Prepared By</th>
                <th>Prepared For</th>
                <th>Invoice Detail</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="field">AccessWorld Tech.</td>
                <td class="field">{{ $invoice->customer->display_name }}</td>
                <td rowspan="4">
                    <div class="well">
                        <div>Code: {{ $invoice->code }}</div>
                        <div>Date: {{ $invoice->date }}</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="field">5th Floor Bhat Bhateni</td>
                <td class="field">{{ $invoice->customer->detail->address }}</td>
            </tr>
            <tr>
                <td class="field">Krishna Galli, Lalitpur</td>
                <td class="field"></td>
            </tr>
            <tr>
                <td class="field">Phone: (987) 555-5555</td>
                <td class="field"></td>
            </tr>
        </tbody>
    </table>
    <table class="list" style="width: 100%; margin-top: 1em;">
        <tbody>
            <tr class="head">
                <td style="width: 5%">#</td>
                <td style="width: 40%">Name</td>
                <td style="width: 20%">Service</td>
                <td style="width: 20%">Term</td>
                <td class="right" style="width: 15%;">Price</td>
            </tr>
            @foreach($invoice->orders() as $key => $order)
                <tr class="list_row">
                    <td>{{ ++$key }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ class_basename($order) }}</td>
                    <td class="right">{{ is_null($order->term) ? $order->duration .' Year(s)' : $order->term . ' Month(s)' }}</td>
                    <td class="right">{{ get_local_currency_code().' '.number_format(get_local_price($order->price, true) ,2) }}</td>
                </tr>
            @endforeach
            <tr class="foot">
                <td colspan="4" class="right">
                    <strong>Sub total:</strong>
                </td>
                <td class="right"
                    style="font-weight: bold">{{ get_local_currency_code().' '.number_format(get_local_price($invoice->sub_total, true), 2) }}</td>
            </tr>
            <tr class="foot">
                <td colspan="4" class="right">
                    <strong>VAT ({{ \App\Models\Invoice::getVat() * 100 }}%):</strong>
                </td>
                <td class="right"
                    style="font-weight: bold">{{ get_local_currency_code().' '.number_format(get_local_price($invoice->vat, true), 2) }}</td>
            </tr>
            <tr class="foot">
                <td colspan="4" class="right">
                    <strong>Grand total:</strong>
                </td>
                <td class="right"
                    style="font-weight: bold">{{ get_local_currency_code().' '.number_format(get_local_price($invoice->total, true), 2) }}</td>
            </tr>
        </tbody>
    </table>
    <div style="font-size:0.8em; font-style: italic; margin-top: 20px;">
        <p>{!!site_info('invoice_info')!!}</p>
    </div>
    <div style="font-size:0.8em; font-weight: bold; margin-top: 20px; text-align: center">
        &copy; AccessWorld Tech. {{ date('Y') }}
    </div>
</body>
</html>

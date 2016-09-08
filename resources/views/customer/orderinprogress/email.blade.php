@if($customer->emailOrders()->notProvisioned()->get()->isEmpty())
    <div class="row text-center">
        You don't have any VPS. <a href="{{ route('service.show', 'cloud-email') }}">Buy</a>
    </div>
@else
    <div class="panel-group" id="accordion-email-order">
        @foreach($customer->emailOrders()->notProvisioned()->get() as $i => $order)
            <div class="card panel expanded">
                <div class="padding-1 collapsed" data-toggle="collapse" data-parent="#accordion-email-order" data-target="#accordion-email-order-{{ $i }}">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <p class="sname">{{ $order->name }}</p>
                        </div>
                        <div class="col-sm-5">
                            Order Date : {{ $order->created_at }}
                        </div>
                        <div class="text-right col-sm-4">
                            <div class="tools">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-default"><i class="fa fa-angle-down"></i></button>
                                    {{-- <button type="button" class="btn btn-warning"><i class="fa fa-trash"></i></button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion-email-order-{{ $i }}" class="collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-3 logo text-center">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <img src="{{ asset('assets/img/centos.png') }}" class="cen img-responsive">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9 col-xs-12 col-info">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <b>System Information</b>
                                                </div>
                                                <div class="col-sm-6 ha1">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                        <tr>
                                                            <th colspan="2">Hardware</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Domain</td>
                                                            <td>{{ $order->domain }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Disk</td>
                                                            <td>{{ $order->disk }} GB</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Traffic</td>
                                                            <td>{{ $order->traffic }} GB</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
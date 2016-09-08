@if($customer->vpsOrders()->notProvisioned()->get()->isEmpty())
    <div class="row text-center">
        You don't have any VPS. <a href="{{ route('service.show', 'cloud-vps') }}">Buy</a>
    </div>
@else
    <div class="panel-group" id="accordion-vps-order">
        @foreach($customer->vpsOrders()->notProvisioned()->get() as $i => $order)
            <div class="card panel expanded">
                <div class="padding-1 collapsed" data-toggle="collapse" data-parent="#accordion-vps-order" data-target="#accordion-vps-order-{{ $i }}">
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
                    <div id="accordion-vps-order-{{ $i }}" class="collapse">
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
                                                            <td>CPU</td>
                                                            <td>{{ $order->cpu }} Core{{ $order->cpu>1 ? 's' : '' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>RAM</td>
                                                            <td>{{ $order->ram }} GB</td>
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
                                                <div class="col-sm-6">
                                                    <table class="table table-condensed">
                                                        <thead>
                                                        <tr>
                                                            <th colspan="3">Software</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Operating System</td>
                                                            <td>{{ $order->operatingSystem->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>OS bit</td>
                                                            <td>64 Bits</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Data Center</td>
                                                            <td>{{ ucwords($order->dataCenter->name) }}</td>
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
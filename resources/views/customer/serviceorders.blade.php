<div class="card sub-card card-underline">
    <div class="card-body">
        @if($invoices->isEmpty())
            <p class="text-center">You don't have any service orders.</p>
        @else
            @foreach($invoices as $key => $invoice)
                <a href="{{ route('invoice.show', $invoice->code) }}" target="_blank">
                    <div class="list-item card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-1">
                                    <i class="fa fa-bars list-icon"></i>
                                </div>
                                <div class="col-sm-3">
                                    <p><span class="plabel">Code:</span>{{ $invoice->code }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <p><span class="plabel">Date:</span>{{ $invoice->date }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <?php 
                                        $services = [];
                                        foreach ($invoice->orders() as $key => $order) {
                                            $services[$key] = class_basename($order);
                                        }
                                    ?>
                                    {{ implode(', ', $services) }}
                                </div>
                                <div class="col-sm-2 text-right">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-success">View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</div>
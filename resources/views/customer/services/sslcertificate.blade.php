@if($customer->sslOrders->isEmpty())
  <div class="row text-center" style="margin-top: 100px;">
    <div class="col-xs-6 col-xs-offset-3 text-center hidden-xs">
      <img src="{{ App\Models\Service::where('slug', 'ssl-certificate')->first()->image->thumbnail(200,200) }}" class="img-responsive" style="display: initial;">
    </div>
    <div class="col-xs-12">
      <h3 class="opacity-50" style="margin: 5px initial;">You don't have any SSL certificates yet.</h3>
      <a href="{{ route('service.show', 'ssl-certificate') }}" class="btn btn-lg btn-primary" target="_blank">Try this service</a>
    </div>
  </div>
@else
  <div class="panel-group" id="accordion-domain">
    @foreach($customer->sslOrders as $i => $order)
      <div class="card panel expanded">
        <div class="padding-1" data-toggle="collapse" data-parent="#domain-group"
           data-target="#services-domain-{{ $i }}">
          <div class="row">
            <div class="col-sm-4 col-xs-12 text-center">
              <span class="text-lg">{{ $order->detail->domain }}</span>
            </div>
            <div class="col-sm-2 col-xs-12 text-center">
              <span class="text-caption">Subscribed on</span>
              <small>{{ $order->start_date }}</small>
            </div>
            <div class="col-sm-2 col-xs-12 text-center">
              <span class="text-caption">Expires on</span>
              <small>{{ $order->expiry_date }}</small>
            </div>
            <div class="col-sm-4 col-xs-12 text-center">
              <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-default" title="Expand">
                  Details <i class="fa fa-angle-down"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div id="services-domain-{{ $i }}" class="collapse {{$i == 0 ? 'in' : ''}}">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3 logo text-center hidden-xs">
                <div class="row">
                  <div class="col-sm-12">
                    <img src="{{ asset('assets/img/logos/'.$order->productType->provider->slug.'logo_vertical.png') }}" class="cen img-responsive">
                  </div>
                </div>
              </div>
              <div class="col-sm-9 col-xs-12 col-info">
                <div class="row">
                  <div class="col-sm-6 ha1">
                    <table class="table table-condensed">
                      <thead>
                      <tr>
                        <th colspan="2">Service Details</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td class="hidden-xs">Domain Name</td>
                        <td>{{ $order->detail->domain }}</td>
                      </tr>
                      <tr>
                        <td class="hidden-xs">SSL Provider</td>
                        <td>{{ $order->productType->name }}</td>
                      </tr>
                      <tr>
                        <td class="hidden-xs">SSL Product Type</td>
                        <td>{{ $order->productType->provider->name }}</td>
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
    @endforeach
  </div>
@endif
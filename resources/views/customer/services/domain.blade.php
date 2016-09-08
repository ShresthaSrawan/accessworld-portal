@if($customer->domainOrders->isEmpty())
  <div class="row text-center" style="margin-top: 100px;">
    <div class="col-xs-6 col-xs-offset-3 text-center hidden-xs">
      <img src="{{ App\Models\Service::where('slug', 'domain')->first()->image->thumbnail(200,200) }}" class="img-responsive" style="display: initial;">
    </div>
    <div class="col-xs-12">
      <h3 class="opacity-50" style="margin: 5px initial;">You don't have any domain registrations yet.</h3>
      <a href="{{ route('service.show', 'domain') }}" class="btn btn-lg btn-primary" target="_blank">Try this service</a>
    </div>
  </div>
@else
  <div class="panel-group" id="accordion-domain">
    @foreach($customer->domainOrders as $i => $order)
      <div class="card panel expanded">
        <div class="padding-1" data-toggle="collapse" data-parent="#domain-group"
           data-target="#services-domain-{{ $i }}">
          <div class="row">
            <div class="col-sm-4 col-xs-12 text-center">
              <span class="text-lg">{{ $order->name }}</span>
            </div>
            <div class="col-sm-2 col-xs-12 text-center">
              <span class="text-caption">Subscribed on</span>
              <small>{{ $order->reg_date }}</small>
            </div>
            <div class="col-sm-2 col-xs-12 text-center">
              <span class="text-caption">Expires on</span>
              <small>{{ $order->exp_date }}</small>
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
              <div class="col-md-3 logo text-center hidden-xs">
                <div class="row">
                  <div class="col-sm-12">
                    <img src="{{ asset('assets/img/icons/service-domain.png') }}" class="cen img-responsive">
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-xs-12 col-info">
                <div class="row">
                  <div class="col-sm-6 ha1">
                    <table class="table table-condensed">
                      <thead>
                      <tr>
                        <th colspan="2"></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td class="hidden-xs">Domain Name</td>
                        <td>{{ $order->name }}</td>
                      </tr>
                      <tr>
                        <td class="hidden-xs">Name Server 1</td>
                        <td>{{ display($order->name_server_1) }}</td>
                      </tr>
                      <tr>
                        <td class="hidden-xs">Name Server 2</td>
                        <td>{{ display($order->name_server_2) }}</td>
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
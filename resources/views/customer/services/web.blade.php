@if($customer->webProvisions->isEmpty())
  <div class="row text-center" style="margin-top: 100px;">
    <div class="col-xs-6 col-xs-offset-3 text-center hidden-xs">
      <img src="{{ App\Models\Service::where('slug', 'web')->first()->image->thumbnail(200,200) }}" class="img-responsive" style="display: initial;">
    </div>
    <div class="col-xs-12">
      <h3 class="opacity-50" style="margin: 5px initial;">You don't have any web hostings yet.</h3>
      <a href="{{ route('service.show', 'web') }}" class="btn btn-lg btn-primary" target="_blank">Try this service</a>
    </div>
  </div>
@else
  <div class="panel-group" id="accordion-website">
    @foreach($customer->webProvisions as $i => $provision)
      <div class="card panel expanded">
        <div class="padding-1" data-toggle="collapse" data-parent="#website-group"
           data-target="#services-website-{{ $i }}">
          <div class="row">
            <div class="col-sm-4 col-xs-12 text-center">
              <span class="text-lg">{{ $provision->name }}</span>
            </div>
            <div class="col-sm-2 col-xs-12 text-center">
              <span class="text-caption">Subscribed on</span>
              <small>{{ $provision->subscribed_on }}</small>
            </div>
            <div class="col-sm-2 col-xs-12 text-center">
              <span class="text-caption">Expires on</span>
              <small>{{ $provision->expires_on }}</small>
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
        <div id="services-website-{{ $i }}" class="collapse {{$i == 0 ? 'in' : ''}}">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 logo text-center hidden-xs">
                <div class="row">
                  <div class="col-sm-12">
                    <img src="{{ asset('assets/img/web_host.png') }}" class="cen img-responsive">
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-xs-12 col-info">
                <div class="row">
                  <div class="col-sm-6 ha1">
                    <table class="table table-condensed">
                      <thead>
                      <tr>
                        <th colspan="2">Package Details</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Name</td>
                        <td>{{ $provision->name }}</td>
                      </tr>
                      <tr>
                        <td>Domain</td>
                        <td>{{ $provision->domain }}</td>
                      </tr>
                      <tr>
                        <td>Disk</td>
                        <td>{{ $provision->disk }} GB</td>
                      </tr>
                      <tr>
                        <td>Traffic</td>
                        <td>{{ $provision->traffic }} GB</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-sm-6 text-center">
                    <a class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised" href="https://lakuri3.accessworld.net:8080/phpmyadmin">
                      <h4>Database</h4>
                      <i class="fa fa-database fa-2x"></i>
                    </a>
                    <a class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised" href="https://lakuri3.accessworld.net:8080/">
                      <h4>Admin</h4>
                      <i class="fa fa-television fa-2x"></i>
                    </a>
                    <a class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised request-renew-service" href="#"
                       data-url="{{ route('manageweb.renew', $provision->name) }}"
                       data-type="Web Hosting"
                    >
                      <h4>Renew</h4>
                      <i class="fa fa-refresh fa-2x"></i>
                    </a>
                    <a href="#" class="request-delete-service btn-tile btn ink-reaction margin-1 btn-default-light btn-raised" 
                       data-type="web" 
                       data-url="{{ route('manageweb.delete', $provision->name) }}"
                    >
                      <h4>Delete</h4>
                      <i class="fa fa-trash fa-2x"></i>
                    </a>
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
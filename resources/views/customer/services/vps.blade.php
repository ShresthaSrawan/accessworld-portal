@if($customer->vpsProvisions->isEmpty())
  <div class="row text-center" style="margin-top: 100px;">
    <div class="col-xs-6 col-xs-offset-3 text-center hidden-xs">
      <img src="{{ App\Models\Service::where('slug', 'vps')->first()->image->thumbnail(200,200) }}" class="img-responsive" style="display: initial;">
    </div>
    <div class="col-xs-12">
      <h3 class="opacity-50" style="margin: 5px initial;">You don't have any VPS service yet.</h3>
      <a href="{{ route('service.show', 'vps') }}" class="btn btn-lg btn-primary" target="_blank">Try this service</a>
    </div>
  </div>
@else
  <div class="panel-group" id="accordion-vps">
    @foreach($customer->vpsProvisions as $i => $provision)
      <div class="card panel expanded">
        <?php $state = strtolower ( $provision->getState () ); ?>
        <div class="padding-1" data-toggle="collapse" data-parent="#accordion-vps" data-target="#accordion-vps-{{ $i }}">
          <div class="row">
            <div class="col-sm-4 col-xs-12 text-center">
              <span class="text-lg">{{ $provision->name }}</span>
              <span class="text-caption text-capitalize">
                <i class="fa fa-circle service-state text-{{ class_service_state($state) }}"></i> {{ empty($state) ? 'unknown' : $state }}
              </span>
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
              <div class="btn-group btn-group-sm btn-raised">
                @if(strcasecmp('paused', $state) == 0)
                  <button type="button" class="btn btn-success btn-confirm-post"
                      data-action="resume the vm" title="Resume"
                      data-url="{{ route('managevps.unpause', $provision->name) }}">
                    <i class="fa fa-play"></i>
                  </button>
                @elseif(strcasecmp('running', $state) == 0)
                  <button type="button" class="btn btn-warning btn-confirm-post"
                      data-action="pause the vm" title="Pause"
                      data-url="{{ route('managevps.pause', $provision->name) }}">
                    <i class="fa fa-pause"></i>
                  </button>
                  <button type="button" class="btn btn-toolbar btn-confirm-post" title="Reboot"
                      data-action="reboot the vm"
                      data-url="{{ route('managevps.reboot', $provision->name) }}">
                    <i class="fa fa-repeat"></i>
                  </button>
                @endif
                <button type="button" class="btn btn-default" title="Expand">
                  Details <i class="fa fa-angle-down"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div id="accordion-vps-{{ $i }}" class="collapse {{$i == 0 ? 'in' : ''}}">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 logo text-center">
                <div class="row">
                  <div class="col-sm-12 hidden-xs">
                    <img src="{{ asset($provision->operatingSystem->image->path) }}"
                       class="cen img-responsive">
                  </div>
                  <div class="col-sm-12">
                    <h5>Server ID : {{ $provision->server_id }}</h5>
                  </div>
                  <div class="col-sm-12">
                    <h5>IP Address: {{ $provision->ips->isEmpty() ? ' -' : $provision->ips->first()->ip_address }}</h5>
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
                        <td>{{ $provision->cpu }}
                          Core{{ $provision->cpu > 1 ? 's' : '' }}</td>
                      </tr>
                      <tr>
                        <td>RAM</td>
                        <td>{{ $provision->ram }} GB</td>
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
                    <table class="table table-condensed">
                      <thead>
                      <tr>
                        <th colspan="3">Software</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Operating System</td>
                        <td>{{ $provision->operatingSystem->name }}</td>
                      </tr>
                      <tr>
                        <td>OS bit</td>
                        <td>64 Bits</td>
                      </tr>
                      <tr>
                        <td>Data Center</td>
                        <td>{{ ucwords($provision->dataCenter->name) }}</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-sm-6 text-center">
                    <a href="#"
                       class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised btn-prompt-post"
                       data-url="{{ route('managevps.rename', $provision->name) }}"
                       data-action="rename the vm"
                       data-name="{{ $provision->name }}">
                      <h4>Rename</h4>
                      <i class="fa fa-edit fa-2x"></i>
                    </a>
                    <a href="{{route('service.vps.stat', $provision->name)}}"
                       class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised" target="_blank">
                      <h4>Stats</h4>
                      <i class="fa fa-bar-chart fa-2x"></i>
                    </a>
                    <!--
                    <a href="{{ route('service.vps.upgrade', $provision->name ) }}"
                       class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised">
                      <h4>Upgrade</h4>
                      <i class="fa fa-level-up fa-2x"></i>
                    </a>
                    -->
                    <a href="#"
                       class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised request-renew-service"
                       data-url="{{ route('managevps.renew', $provision->name) }}"
                       data-type="VPS">
                      <h4>Renew</h4>
                      <i class="fa fa-refresh fa-2x"></i>
                    </a>
                    <a href="#"
                       class="btn-tile btn ink-reaction margin-1 btn-default-light btn-raised request-delete-service"
                       data-type="vps"
                       data-url="{{ route('managevps.delete', $provision->name) }}">
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
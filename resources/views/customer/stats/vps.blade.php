@extends('layouts.master')

@section('title', 'VPS Statistics')

@section('header')
  {{ Html::style('vendor/DataTables/jquery.dataTables.css') }}
  {{ Html::style('vendor/DataTables/extensions/dataTables.colVis.css') }}
  {{ Html::style('vendor/DataTables/extensions/dataTables.tableTools.css') }}
  <style>
    .hbox-xs {
      padding: 1em 0;
    }
    .dial {
      font-size: 24px !important;
    }
  </style>
@stop

@section('body')
  <section>
    <div class="section-body">
      <div class="container">
        <!-- Overview -->
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h3 class="no-margin">Overview <a href="{{ route('customer.index') }}" class="btn btn-xs btn-flat btn-accent pull-right ink-reaction">My Panel</a></h3>
                <div class="col-xs-12 hbox-xs">
                  <div class="hbox-column width-2">
                    <img class="img-responsive pull-left" src="{{asset($provision->operatingSystem->image->path)}}" alt="os_image">
                  </div>
                  <div class="hbox-column v-top">
                    <div class="clearfix">
                      <div class="col-lg-12 margin-bottom-lg">
                        <a class="text-lg text-medium" href="{{route('customer.index')}}">{{$provision->name}}</a>
                      </div>
                    </div>
                    <div class="clearfix opacity-75">
                      <div class="col-md-12">
                        <span class="md md-cloud-upload text-sm text-accent"></span>&nbsp;Total Upload:&nbsp;<span id="total-upload-usage"></span>
                      </div>
                      <div class="col-md-12">
                        <span class="md md-cloud-download text-sm text-primary"></span>&nbsp;Total Download:&nbsp;<span id="total-download-usage"></span>
                      </div>
                      <div class="col-md-12">
                        <span class="md md-today text-sm"></span>&nbsp;Reported Period:&nbsp;<span class="display-usage-date">{{$dates->first()}}</span></span>
                      </div>
                      <div class="col-md-12">
                        <span class="md md-event text-sm"></span>&nbsp;Last Update:&nbsp;{{display($lastUpdate)}}</span>
                      </div>
                    </div>
                  </div><!--end .hbox-column -->
                </div>
                <form class="form-horizontal" role="form">
                  <div class="form-group" style="margin-bottom:20px;">
                    {{Form::label('t_date', 'Date', ['class' => 'col-sm-2 control-label'])}}
                    <div class="col-sm-10">
                      {{Form::select('t_date', $dates, 1, ['id' => 'usage-date' ,'class' => 'form-control', 'required'])}}
                      <div class="form-control-line"></div>
                    </div>
                    <p class="help-block">Change date to view usage history</p>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h3 class="no-margin">Live Stats</h3>
                <div class="row">
                  <div class="row" id="knob-container" data-source="{{ route('api.vps.stat', $provision->name) }}" style="margin-top:12px;">
                    <div class="col-sm-6 text-center">
                      <p class="text-lg">CPU</p>
                      <div class="knob knob-primary knob-default-light-track size-4 loading-spinner">
                        <input type="text" id="cpu-knob" class="dial hidden" data-angleOffset=-125 data-angleArc=250 data-readOnly=true data-step="0.01" data-percentage=true>
                      </div>
                    </div>
                    <div class="col-sm-6 text-center">
                      <p class="text-lg">RAM</p>
                      <div class="knob knob-primary knob-default-light-track size-4 loading-spinner">
                        <input type="text" id="ram-knob" class="dial hidden" data-angleOffset=-125 data-angleArc=250 data-readOnly=true data-step="0.01" data-percentage=true>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Graph -->
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-head">
                <header>Monthly Usage Graph <span class="display-usage-date">{{$dates->first()}}</span></header>
              </div>
              <div class="card-body">
                <div id="monthly-graph" class="flot height-6" data-title="Monthly Usage" data-color="#2196F3,#e91e63,#313335"></div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-head">
                <header>Daily Usage Graph <span class="display-usage-date">{{$dates->first()}}</span></header>
              </div>
              <div class="card-body">
                <div id="daily-graph" class="flot height-6" data-title="Daily Usage" data-color="#2196F3,#e91e63,#313335"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- DataTable -->
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-head">
                <header>Monthly Usage <span class="display-usage-date">{{$dates->first()}}</span></header>
              </div>
              <div class="card-body">
                <table id="vps-monthly-datatable" class="table table-hover table-striped" data-source="{{route('api.vps.monthly.usage', $provision->name)}}"
                  data-swftools="/vendor/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf">
                  <thead>
                    <th>Month</th>
                    <th>Download (GB)</th>
                    <th>Upload (GB)</th>
                    <th>Total</th>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-head">
                <header>Daily Usage <span class="display-usage-date">{{$dates->first()}}</span></header>
              </div>
              <div class="card-body">
                <table id="vps-daily-datatable" class="table table-hover table-striped" data-source="{{route('api.vps.daily.usage', $provision->name)}}"
                  data-swftools="/vendor/DataTables/extensions/TableTools/swf/copy_csv_xls_pdf.swf">
                  <thead>
                    <th>Month</th>
                    <th>Download (GB)</th>
                    <th>Upload (GB)</th>
                    <th>Total</th>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('footer')
  {{ Html::script('vendor/DataTables/jquery.dataTables.min.js') }}
  {{ Html::script('vendor/DataTables/extensions/ColVis/js/dataTables.colVis.min.js') }}
  {{ Html::script('vendor/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}
  {{ Html::script('vendor/flot/jquery.flot.min.js') }}
  {{ Html::script('vendor/jquery-knob/jquery.knob.min.js') }}
  <script>
    var m = new Array();
    m[1] = "January";
    m[2] = "February";
    m[3] = "March";
    m[4] = "April";
    m[5] = "May";
    m[6] = "June";
    m[7] = "July";
    m[8] = "August";
    m[9] = "September";
    m[10] = "October";
    m[11] = "November";
    m[12] = "December";
  </script>
  {{ Html::script('assets/js/stats.js') }}
@stop
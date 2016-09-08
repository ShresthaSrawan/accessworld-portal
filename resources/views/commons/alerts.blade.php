@if( Session::has( 'activation' ) ||  session('status'))
  <!--Alerts Messages-->
  <div class="row" id="alerts">
    <div class="col-sm-12">
      @if( Session::has( 'activation' ) )
        <div class="alert alert-warning alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="fa fa-warning"></i> Alert!</h4>
          {!! Session::get( 'activation' ) !!}
        </div>
      @endif
      @if (session('status'))
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session('status') }}
        </div>
      @endif
    </div>
  </div>
@endif

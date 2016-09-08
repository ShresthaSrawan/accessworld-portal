<div class="card-body no-padding">
  <div class="col-md-12">
  <ul class="list divider-full-bleed">
    <li class="tile">
      <a class="tile-content">
        <div class="tile-text">
          <h3 class="text-xxl">{{ $domain }}</h3>
          <h4 class="text-xl">
            {{ $availability[ 'status' ] }}
          </h4>
        </div>
      </a>
      @unless( $availability[ 'status' ] == 'taken' )
        <a class="btn btn-flat btn-default">{{ $availability[ 'price' ] }} per year</a>
        {{ Form::open( [ 'route' => [ 'service.domain.create', $domain ], 'class' => 'btn' ] ) }}
          <button class="btn btn-flat btn-success" type="submit">
            <i class="fa fa-shopping-cart"></i> proceed
          </button>
        {{ Form::close() }}
      @else
        <a class="btn btn-flat btn-danger"><span class="text-xl">Unavailable</span></a>
      @endunless
    </li>
  </ul>
  </div>
</div>
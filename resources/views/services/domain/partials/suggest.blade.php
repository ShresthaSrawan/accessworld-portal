<div class="row">
  <div class="col-sm-4">
    <div class="card border-bottom-accent-light" id="tldList">
      <div class="card-body">
        <h3 class="text-light no-margin">Select Extensions</h3><br/>
        <div class="form-group">
          @foreach(config('awt.domain.tld') as $tld)
            <div class="checkbox checkbox-styled">
              <label>
                <input class="tld-checkbox" type="checkbox" value="{{ $tld }}" name="tld" {{ in_array ( $tld , $selectedTld ) ? 'checked' : '' }}>
                <span>{{ $tld }}</span>
              </label>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="card border-bottom-accent-light" id="nameSuggestList">
      <div class="card-body no-padding">
        @foreach( $suggestions as $type => $item )
          <ul class="list divider-full-bleed">
            @foreach($item as $domain => $attr)
              <li class="tile">
                <a class="tile-content">
                  <div class="tile-text">
                    {{ $domain }}
                    <small>
                      {{ $attr[ 'status' ] }}&nbsp;
                      @if( $type == 'premium' )
                        <button class="btn btn-default-dark" type="button">
                          Premium
                        </button>
                      @endif
                    </small>
                  </div>
                </a>
                @unless( $attr[ 'status' ] == 'taken' )
                  <a class="btn btn-flat btn-default">{{ $attr[ 'price' ] }} per year</a>
                  {{ Form::open( [ 'route' => [ 'service.domain.create', $domain ], 'class' => 'btn' ] ) }}
                    <button class="btn btn-flat btn-success" type="submit">
                      <i class="fa fa-shopping-cart"></i> proceed
                    </button>
                  {{ Form::close() }}
                @else
                  <a class="btn btn-flat btn-danger">Unavailable</a>
                @endunless
              </li>
            @endforeach
          </ul>
        @endforeach
      </div>
    </div>
  </div>
</div>
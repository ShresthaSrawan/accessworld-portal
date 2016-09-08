{{ Form::open(['route' => ['managevps.update', $provision->uuid], 'method' => 'PUT', 'novalidate']) }}
    @foreach($provision->package->components as $component)
        <div class="row">
            <label class="control-label col-sm-6 text-right">{{ $component->name }}</label>
            <div class="col-sm-6">
                @if($component->options->isEmpty())
                    {{ Form::number("components[{$component->id}]", $component->pivot->value, [ 'class' => 'form-control', 'min' => $component->pivot->value ]) }}
                @else
                    {{ Form::select("components[{$component->id}]", $component->options()->lists('option', 'id'), $component->pivot->value, ['class'=>'form-control']) }}
                @endif
            </div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-sm-6 col-sm-offset-6">
            <button class="btn btn-primary">Submit</button>
        </div>
    </div>
{{ Form::close() }}
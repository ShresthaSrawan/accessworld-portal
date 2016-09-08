<div class="container-fluid">
    <div class="panel panel-default" style="border-radius: 0px;">
        <div class="panel-heading text-center">
            <span class="help-block">
                <p>Please enter a valid domain for free DNS service. <strong>Eg: accessworld.net</strong></p>
                <p>After submission, your request will go through verification process.</p>
                <p>We will inform you through email if your request was approved or not.</p>
            </span>
        </div>
        <div class="panel-body">
            {{ Form::open(['route' => 'customer.freeDns', 'class' => 'form', 'role' => 'form']) }}
                {{ Form::label('domain', 'Request a free DNS') }}
                <div class="input-group">
                    {{ Form::text('domain', old('domain'), ['class' => 'form-control', 'required', 'placeholder' => 'Eg: '.Auth::user()->username.'.com']) }}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary" style="height: 50px">Go!</button>
                    </span>
                </div>
            {{ Form::close() }}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12"> 
            @if($customer->freeDns->isEmpty())
                <p class="text-center">You don't have any free DNS.</p>
            @else
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="list-title">All Domains</h2>
                    </div>
                </div>
                <div class="list-container"> 
                    @foreach($customer->freeDns as $i => $dns)
                        <div class="list-item">
                            <div class="row">
                                <div class="col-sm-9">
                                    <h2 style="margin-top: 10px;">{{ ++$i.". ".$dns->domain }}</h2>
                                </div>
                                <div class="col-sm-3 service-action">
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-default">
                                            <i class="fa fa-gears fa-fw"></i> Configure
                                        </a>
                                        <a href="#" class="btn btn-default">
                                            <i class="fa fa-trash fa-fw"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <em>Requested Date: {{ $dns->requested_date }}</em>
                                </div>
                                <div class="col-sm-3">
                                    <em>Verified Date: {{ $dns->verified_date }}</em>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
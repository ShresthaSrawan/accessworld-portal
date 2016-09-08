@unless(empty($service->description))
    <div class="col-xs-12">
        <div class="card">
            <div class="card-body">
                <article>
                    <p class="text-justify">{!! $service->description !!}</p>
                </article>
            </div>
        </div>
    </div>
@endunless
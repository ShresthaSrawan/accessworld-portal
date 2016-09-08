<div class="slick-carousel">
    @foreach($events as $event)
        <div class="col-xs-12 slick-carousel-item">
            <h3 class="no-margin">
                {{ mb_strimwidth(strip_tags($event->description), 0, 87, '...') }}
                <a href="{{ route('event.show', $event->slug) }}" class="btn btn-raised btn-accent ink-reaction pull-right">
                    Read More
                </a>
            </h3>
        </div>
    @endforeach
</div>
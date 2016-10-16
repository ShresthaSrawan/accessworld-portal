<div class="col-md-5 animated fadeInLeft">
    @if(!empty($certificates))
        <h3>Certifications</h3>
        <div class="slick-carousel">
            @foreach($certificates as $certificate)
                <div class="slick-carousel-item row">
                    <div class="col-xs-4">
                        <a class="fancybox" title="{{ $certificate->title }}" href="{{ $certificate->image->path }}">
                            <img src="{{ $certificate->image->thumbnail(97,146) }}" class="img-responsive" alt="certifications_{{ $certificate->title }}" width="97" height="146">
                        </a>
                    </div>
                    <div class="col-xs-8">
                        <h3>{{ $certificate->title }}</h3>
                        <p>{!! strip_tags($certificate->description) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h3>Certifications</h3>
        <div class="slick-carousel">
            <div class="slick-carousel-item row">
                <div class="col-xs-4">
                    <a class="fancybox" title="Lorem ipsum dolor sit amet." href="{{ asset('assets/img/avatar1.jpg') }}">
                        <img src="{{ asset('assets/img/avatar1.jpg') }}" class="img-responsive" alt="Description">
                    </a>
                </div>
                <div class="col-xs-8">
                    <h3>Lorem ipsum dolor sit amet.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, consectetur!</p>
                </div>
            </div>
            <div class="slick-carousel-item row">
                <div class="col-xs-4">
                    <a class="fancybox" title="Lorem ipsum dolor sit amet." href="{{ asset('assets/img/avatar1.jpg') }}">
                        <img src="{{ asset('assets/img/avatar1.jpg') }}" class="img-responsive" alt="Description">
                    </a>
                </div>
                <div class="col-xs-8">
                    <h3>Lorem ipsum dolor sit amet.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet, consectetur!</p>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="col-md-7 animated fadeInRight">
    @if(!empty($homePage->description))
        <div class="welcome-block">
            <h3>{{ $homePage->title }}</h3>
            <div>
                <p class="text-justify text-lg">{!! strip_tags($homePage->description) !!}</p>
            </div>
            <div>
                <a href="{{ route('page.show', 'about') }}" class="btn btn-accent btn-raised ink-reaction pull-right">Read More</a>
            </div>
        </div>
    @else
        <div class="welcome-block">
            <h3>AccessWorld Tech.</h3>
            <div>
                <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequuntur, distinctio doloremque eos fugiat fugit laborum molestiae nesciunt officiis optio pariatur perspiciatis soluta unde voluptate voluptates. Accusantium adipisci alias aliquid cumque delectus dicta, dolore dolorum ducimus eaque est eveniet expedita impedit ipsam molestiae odit perferendis perspiciatis quas unde vel voluptatibus.</p>
            </div>
            <a href="{{ route('page.show','about') }}" class="btn btn-accent btn-raised ink-reaction pull-right">Read More</a>
        </div>
    @endif
</div>
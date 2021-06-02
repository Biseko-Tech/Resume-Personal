<div class="portfolio" id="portfolio">
    <div class="content-inner">
        <div class="content-header">
            <h2>Portfolio</h2>
        </div>

        <div class="row portfolio-container">
            @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 portfolio-item web-des">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="{{ asset($portfolio->image) }}" class="img-fluid" alt="">
                            <a href="{{ asset($portfolio->image) }}" data-lightbox="portfolio" data-title="Project Name" class="link-preview" title="Preview"><i class="fa fa-eye"></i></a>
                            <a href="{{ $portfolio->url_address }}" class="link-details" title="More Details" target="_blank"><i class="fa fa-link"></i></a>
                            <a class="portfolio-title" href="#">{{ $portfolio->project_name }}<span>{{ $portfolio->project_type }}</span></a>
                        </figure>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="review" id="review">
    <div class="content-inner">
        <div class="content-header">
            <h2>Review</h2>
        </div>
        <div class="row align-items-center review-slider">
            @foreach ($reviews as $review)
                <div class="col-md-12">
                    <div class="review-slider-item">
                        <div class="review-text">
                            <p>{{ $review->client_description }}</p>
                        </div>
                        <div class="review-img">
                            <img src="{{ asset($review->client_photo) }}" alt="Image">
                            <div class="review-name">
                                <h3>{{ $review->client_name }}</h3>
                                <p>{{ $review->client_title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
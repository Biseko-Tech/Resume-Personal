<div class="experience" id="experience">
    <div class="content-inner">
        <div class="content-header">
            <h2>Experience</h2>
        </div>
        <div class="row align-items-center">
            @foreach ($experiences as $experience)
                <div class="col-md-6">
                    <div class="exp-col">
                        <span>{{ $experience->start->format('M d, Y') }}<i> to </i>{{ $experience->end->format('M d, Y') }}</span>
                        <h3>{{ $experience->company }}</h3>
                        <h4>{{ $experience->address }}</h4>
                        <h5>{{ $experience->title }}</h5>
                        <p>{{ $experience->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="education" id="education">
    <div class="content-inner">
        <div class="content-header">
            <h2>Education</h2>
        </div>
        <div class="row align-items-center">
            @foreach ($educations as $education)
                <div class="col-md-6">
                    <div class="edu-col">
                        <span>{{ $education->start->format('M d, Y') }}<i> to </i>{{ $education->end->format('M d, Y') }}</span>
                        <h3>{{ $education->level }}</h3>
                        <p>{{ $education->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
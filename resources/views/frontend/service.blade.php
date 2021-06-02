<div class="service" id="service">
    <div class="content-inner">
        <div class="content-header">
            <h2>Service</h2>
        </div>
        <div class="row align-items-center">
            @foreach ($services as $service)
                <div class="col-md-6">
                    <div class="srv-col">
                        <img src="{{ asset($service->service_icon) }}" style="height: 48px; width: 48px;" alt="Image">
                        <h3>{{ $service->service_title }}</h3>
                        <p>{{ $service->service_body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

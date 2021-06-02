@extends('admin.admin')

@section('admin')

<div class="row">
    @if (session('success'))
    <div class="col-lg-12">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Wow...!</strong>{{ session('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Edit service Details</div>
            <div class="card-body">
                <form action="{{ route('service.update', $service->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="service_title">Service Title</label>
                        <input type="text" class="form-control" name="service_title" id="service_title" value="{{ $service->service_title }}">
                        @error('service_title')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="service_body">Service Description</label>
                        <textarea class="form-control" name="service_body" id="service_body" placeholder="Description goes here">{{ $service->service_body }}</textarea>
                        @error('service_body')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="old_icon" value="{{ $service->service_icon }}">
                        <label for="service_icon">Service Icon</label>
                        <input type="file" class="form-control" name="service_icon" id="service_icon">
                        @error('service_icon')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('service.index') }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

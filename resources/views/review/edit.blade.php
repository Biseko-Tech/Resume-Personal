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
            <div class="card-header">Edit Review Details</div>
            <div class="card-body">
                <form action="{{ route('review.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" name="client_name" id="client_name" value="{{ $review->client_name }}">
                        @error('client_name')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_title">Client Title</label>
                        <input type="text" class="form-control" name="client_title" id="client_title" value="{{ $review->client_title }}">
                        @error('client_title')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_description">Client Description</label>
                        <textarea class="form-control" name="client_description" id="client_description" placeholder="Description goes here">{{ $review->client_description }}</textarea>
                        @error('client_description')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_photo">Client Photo (100 X 100)</label>
                        <input type="hidden" class="form-control" name="old_photo" id="old_photo" value="{{ $review->client_photo }}">
                        <input type="file" class="form-control" name="client_photo" id="client_photo">
                        @error('client_photo')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('review.index') }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
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
            <div class="card-header">Add Portfolio Details</div>
            <div class="card-body">
                <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Enter project name">
                        @error('project_name')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="project_type">Project Type</label>
                        <input type="text" class="form-control" name="project_type" id="project_type" placeholder="Enter project type">
                        @error('project_type')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url_address">Project Address</label>
                        <input type="text" class="form-control" name="url_address" id="url_address" placeholder="http://example.com/home">
                        @error('url_address')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Project Image (500 X 300)</label>
                        <input type="file" class="form-control" name="image" id="image">
                        @error('image')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('portfolio.index') }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
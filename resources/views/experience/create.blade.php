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
            <div class="card-header">Add Education Details</div>
            <div class="card-body">
                <form action="{{ route('experience.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="start">Start Date</label>
                                <input type="date" class="form-control" name="start" id="start">
                                @error('start')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="end">End Date</label>
                                <input type="date" class="form-control" name="end" id="end">
                                @error('end')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="company">Company Name</label>
                                <input type="text" class="form-control" name="company" id="company">
                                @error('company')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="address">Company Address</label>
                                <input type="text" class="form-control" name="address" id="address">
                                @error('address')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="title">Position Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                                @error('title')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Description goes here"></textarea>
                                @error('description')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('experience.index') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
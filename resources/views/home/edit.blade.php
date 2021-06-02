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
            <div class="card-header">Edit Home Details</div>
            <div class="card-body">
                <form action="{{ route('home.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="person_name">Person Name</label>
                        <input type="text" class="form-control" value="{{ $detail->person_name }}" name="person_name" id="person_name">
                        @error('person_name')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="old_photo" value="{{ $detail->person_photo }}">
                    <div class="form-group">
                        <label for="person_photo">Person Photo</label>
                        <input type="file" class="form-control" value="{{ $detail->person_photo }}" name="person_photo" id="person_photo">
                        @error('person_photo')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="old_file" value="{{ $detail->person_file }}">
                    <div class="form-group">
                        <label for="person_file">Person File</label>
                        <input type="file" class="form-control" value="{{ $detail->person_file }}" name="person_file" id="person_file">
                        @error('person_file')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('home.index') }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
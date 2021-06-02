@extends('admin.admin')

@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Edit Title Detail</div>
            <div class="card-body">
                <form action="{{ route('title.update', $title->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title Name</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $title->title }}">
                        @error('title')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('title.index') }}" class="btn btn-warning">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
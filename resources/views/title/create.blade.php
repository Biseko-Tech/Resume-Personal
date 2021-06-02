@extends('admin.admin')

@section('admin')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Add Title Details</div>
            <div class="card-body">
                <form action="{{ route('title.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title Name</label>
                        <input type="text" class="form-control" name="title" id="title">
                        @error('title')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
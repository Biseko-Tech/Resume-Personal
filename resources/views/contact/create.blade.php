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
            <div class="card-header">Add Contact Details</div>
            <div class="card-body">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="owner_name">Owner Name</label>
                                <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="Enter full name">
                                @error('owner_name')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="owner_title">Owner Title</label>
                                <input type="text" class="form-control" name="owner_title" id="owner_title" placeholder="Enter title">
                                @error('owner_title')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="owner_email">Owner Email</label>
                                <input type="email" class="form-control" name="owner_email" id="owner_email" placeholder="Enter email address">
                                @error('owner_email')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="owner_mobile">Owner Mobile</label>
                                <input type="text" class="form-control" name="phone" id="mobile" placeholder="Enter mobile number">
                                @error('phone')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="owner_address">Owner Address</label>
                                <input type="text" class="form-control" name="owner_address" id="owner_address" placeholder="Enter physical address">
                                @error('owner_address')
                                    <span class="text-danger text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('contact.index') }}" class="btn btn-warning">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
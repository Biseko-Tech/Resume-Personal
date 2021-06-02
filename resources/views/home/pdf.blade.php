@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('home.index') }}" class="btn btn-primary mb-3">Go Back</a>
        </div>
        <div class="col-lg-12">
            <iframe height="1200" width="1000" src="{{ asset('documents/home/'.$pdf->person_file) }}" frameborder="0"></iframe>
        </div>
    </div>

@endsection
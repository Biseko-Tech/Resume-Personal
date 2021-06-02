@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-1">
            <a href="{{ route('home.create') }}" class="btn btn-primary mb-3">Create</a>
        </div>
        @if (session('success'))
        <div class="col-lg-11">
            <div class="alert alert-success alert-dismissible fade show py-2" role="alert">
                <strong>Wow...!</strong>{{ session('success') }}
                <button type="button" class="close content-center py-2" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
        <div class="col-lg-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Person Photo</th>
                    <th scope="col">Person Name</th>
                    <th scope="col">Person File</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($details as $detail)
                    <tr>
                        <th scope="row">{{ $details->firstItem()+$loop->index }}</th>
                        <td><img src="{{ asset($detail->person_photo) }}" alt="Image" style="height:30px; width:30px;"></td>
                        <td>{{ $detail->person_name }}</td>
                        <td><a href="{{ route('home.pdf', $detail->id) }}" class="px-3">View</a></td>
                        <td>{{ $detail->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($detail->updated_at == NULL)
                            <span class="text-muted">No Date Set</span>
                            @else
                            {{ $detail->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('home.edit', $detail->id) }}" class="btn btn-info p-1 px-2">Edit</a>
                            <a href="{{ route('home.delete', $detail->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $details->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection
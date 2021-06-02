@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-1">
            <a href="{{ route('about.create') }}" class="btn btn-primary mb-3">Create</a>
        </div>
        @if (session('success'))
        <div class="col-lg-11">
            <div class="alert alert-success alert-dismissible fade show py-2" role="alert">
                <strong>Wow...!</strong> {{ session('success') }}
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
                    <th scope="col" width="7%">SL No</th>
                    <th scope="col"width="11%">About Photo</th>
                    <th scope="col"width="43%">Description</th>
                    <th scope="col"width="13%">Created</th>
                    <th scope="col"width="10%">Updated</th>
                    <th scope="col"width="14%">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($abouts as $about)
                    <tr>
                        <th scope="row">{{ $abouts->firstItem()+$loop->index }}</th>
                        <td><img src="{{ asset($about->photo) }}" style="height: 40px; width: 40px;" alt="image"></td>
                        <td>{{ Str::limit(strip_tags($about->description), 100) }}</td>
                        <td>{{ $about->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($about->updated_at == NULL)
                            <span class="text-muted">No Date Set</span>
                            @else
                            {{ $about->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('about.edit', $about->id) }}" class="btn btn-info p-1 px-2">Edit</a>
                            <a href="{{ route('about.delete', $about->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $abouts->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection
@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-1">
            <a href="{{ route('experience.create') }}" class="btn btn-primary mb-3">Create</a>
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
                    <th scope="col" width="8%">SL No</th>
                    <th scope="col" width="16%">Start Date</th>
                    <th scope="col" width="16%">End Date</th>
                    <th scope="col">Company</th>
                    <th scope="col">Address</th>
                    <th scope="col">Position</th>
                    <th scope="col" width="10%">Description</th>
                    <th scope="col" width="16%">Created</th>
                    <th scope="col" width="16%">Updated</th>
                    <th scope="col" width="18%">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($experiences as $experience)
                    <tr>
                        <th scope="row">{{ $experiences->firstItem()+$loop->index }}</th>
                        <td>{{ $experience->start->format('M d, Y') }}</td>
                        <td>{{ $experience->end->format('M d, Y') }}</td>
                        <td>{{ Str::limit(strip_tags($experience->company), 5)}}</td>
                        <td>{{ Str::limit(strip_tags($experience->address), 5)}}</td>
                        <td>{{ Str::limit(strip_tags($experience->title), 5)}}</td>
                        <td>{{ Str::limit(strip_tags($experience->description), 5) }}</td>
                        <td>{{ $experience->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($experience->updated_at == NULL)
                            <span class="text-muted">No Date Set</span>
                            @else
                            {{ $experience->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('experience.edit', $experience->id) }}" class="btn btn-info p-1 px-2">Edit</a>
                            <a href="{{ route('experience.delete', $experience->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $experiences->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection

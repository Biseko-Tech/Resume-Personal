@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-1">
            <a href="{{ route('education.create') }}" class="btn btn-primary mb-3">Create</a>
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
                    <th scope="col">SL No</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Education Level</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($educations as $education)
                    <tr>
                        <th scope="row">{{ $educations->firstItem()+$loop->index }}</th>
                        <td>{{ $education->start->format('M d, Y') }}</td>
                        <td>{{ $education->end->format('M d, Y') }}</td>
                        <td>{{ Str::limit(strip_tags($education->level), 20)}}</td>
                        <td>{{ Str::limit(strip_tags($education->description), 20) }}</td>
                        <td>{{ $education->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($education->updated_at == NULL)
                            <span class="text-muted">No Date Set</span>
                            @else
                            {{ $education->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('education.edit', $education->id) }}" class="btn btn-info p-1 px-2">Edit</a>
                            <a href="{{ route('education.delete', $education->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $educations->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection

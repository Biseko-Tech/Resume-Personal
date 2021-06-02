@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-1">
            <a href="{{ route('review.create') }}" class="btn btn-primary mb-3">Create</a>
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
                    <th scope="col">Client Photo</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Title</th>
                    <th scope="col">Client Description</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($reviews as $review)
                    <tr>
                        <th scope="row">{{ $reviews->firstItem()+$loop->index }}</th>
                        <td><img src="{{ asset($review->client_photo) }}" alt="Image" style="height:30px; width:30px;"></td>
                        <td>{{ Str::limit(strip_tags($review->client_name), 10) }}</td>
                        <td>{{ Str::limit(strip_tags($review->client_title), 10) }}</td>
                        <td>{{ Str::limit(strip_tags($review->client_description), 30) }}</td>
                        <td>{{ $review->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($review->updated_at == NULL)
                            <span class="text-muted">No Date Set</span>
                            @else
                            {{ $review->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('review.edit', $review->id) }}" class="btn btn-info p-1 px-2">Edit</a>
                            <a href="{{ route('review.delete', $review->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $reviews->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection

@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-1">
            <a href="{{ route('portfolio.create') }}" class="btn btn-primary mb-3">Create</a>
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
                    <th scope="col">Project Image</th>
                    <th scope="col">Project Name</th>
                    <th scope="col">Project Type</th>
                    <th scope="col">Project Address</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($portfolios as $portfolio)
                    <tr>
                        <th scope="row">{{ $portfolios->firstItem()+$loop->index }}</th>
                        <td><img src="{{ asset($portfolio->image) }}" alt="Image" style="height:30px; width:40px;"></td>
                        <td>{{ Str::limit(strip_tags($portfolio->project_name), 15) }}</td>
                        <td>{{ Str::limit(strip_tags($portfolio->project_type), 15) }}</td>
                        <td>{{ Str::limit(strip_tags($portfolio->url_address), 15) }}</td>
                        <td>{{ $portfolio->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($portfolio->updated_at == NULL)
                            <span class="text-muted">No Date Set</span>
                            @else
                            {{ $portfolio->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="btn btn-info p-1 px-2">Edit</a>
                            <a href="{{ route('portfolio.delete', $portfolio->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $portfolios->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection
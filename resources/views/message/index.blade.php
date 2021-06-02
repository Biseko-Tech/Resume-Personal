@extends('admin.admin')

@section('admin')

    <div class="row">
        @if (session('success'))
        <div class="col-lg-12">
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
                    <th scope="col">Client Name</th>
                    <th scope="col">Client Email</th>
                    <th scope="col">Client Subject</th>
                    <th scope="col">Client Mobile</th>
                    <th scope="col">Client Message</th>
                    <th scope="col">Created</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($messages as $message)
                    <tr>
                        <th scope="row">{{ $messages->firstItem()+$loop->index }}</th>
                        <td>{{ Str::limit(strip_tags($message->client_name), 8)}}</td>
                        <td>{{ Str::limit(strip_tags($message->client_email), 10)}}</td>
                        <td>{{ Str::limit(strip_tags($message->client_subject), 10)}}</td>
                        <td>{{ Str::limit(strip_tags($message->client_mobile), 10)}}</td>
                        <td>{{ Str::limit(strip_tags($message->client_message), 20)}}</td>
                        <td>{{ $message->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('message.show', $message->id) }}" class="btn btn-info p-1 px-2">View</a>
                            <a href="{{ route('message.delete', $message->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $messages->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection
@extends('admin.admin')

@section('admin')

    <div class="row">
        <div class="col-lg-1">
            <a href="{{ route('contact.create') }}" class="btn btn-primary mb-3">Create</a>
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
                    <th scope="col">Owner Name</th>
                    <th scope="col">Owner Title</th>
                    <th scope="col">Owner Email</th>
                    <th scope="col">Owner Mobile</th>
                    <th scope="col">Owner Address</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                    {{-- @php($i = 1) --}}
                    @foreach ($contacts as $contact)
                    <tr>
                        <th scope="row">{{ $contacts->firstItem()+$loop->index }}</th>
                        <td>{{ Str::limit(strip_tags($contact->owner_name), 8)}}</td>
                        <td>{{ Str::limit(strip_tags($contact->owner_title), 8)}}</td>
                        <td>{{ Str::limit(strip_tags($contact->owner_email), 8)}}</td>
                        <td>{{ Str::limit(strip_tags($contact->owner_mobile), 8)}}</td>
                        <td>{{ Str::limit(strip_tags($contact->owner_address), 15) }}</td>
                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                        <td>
                            @if ($contact->updated_at == NULL)
                            <span class="text-muted">No Date Set</span>
                            @else
                            {{ $contact->updated_at->diffForHumans() }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-info p-1 px-2">Edit</a>
                            <a href="{{ route('contact.delete', $contact->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-danger p-1 px-2">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex float-right ">
                {{ $contacts->appends(['sort' => 'more'])->links() }}
            </div>
        </div>
    </div>

@endsection

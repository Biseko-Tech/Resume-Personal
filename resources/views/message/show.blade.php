@extends('admin.admin')

@section('admin')


<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Read Mail</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div class="mailbox-read-info pb-4">
                <h4>{{ $message->client_subject }}</h4>
                <h6>From: {{ $message->client_email }} <br>
                    Mobile: <span>{{ $message->client_mobile }}</span>
                    <span class="mailbox-read-time float-right py-2">{{ $message->created_at->format('M d, Y') }}<br><small>Time: {{ $message->created_at->format('h:i A') }}</small></span>
                </h6>
            </div>

            <!-- /.mailbox-controls -->
            <div class="mailbox-read-message">
                <p class="pb-2">Hello {{ auth()->user()->name }},</p>

                <p>{{ $message->client_message }}</p>

                <p class="pt-2">Thanks,<br>{{ $message->client_name }}</p>
            </div><!-- /.mailbox-read-message -->
        </div><!-- /.card-body -->
        
        <!-- /.card-footer -->
        <div class="card-footer">
            <a href="{{ route('message.delete', $message->id) }}" onclick="return confirm('Are you sure to delete this?...')" class="btn btn-default">Delete</a>
            <a href="{{ route('message.index', $message->id) }}" class="btn btn-default">Back</a>
        </div><!-- /.card-footer -->
    </div><!-- /.card -->
</div>

@endsection
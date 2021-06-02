@if (session('success'))
    <div class="col-md-12">
        <div class="alert alert-success alert-dismissible fade show py-2 px-1" role="alert">
            <span class="px-0">{{ session('success') }}</span>
            <button type="button" class="close content-center py-2 px-2" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
<div class="header" id="header">
    <div class="content-inner">
        <p>I'm</p>
        <h1>{{ $home->person_name }}</h1>
        <h2></h2>
        <div class="typed-text">{{ $title->title }}</div>
    </div>
</div>

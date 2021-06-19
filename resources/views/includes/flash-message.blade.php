@if (session()->has('success'))
    <div class="alert alert-success col-md-6">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('failed'))
    <div class="alert alert-warning">
        {{ session()->get('failed') }}
    </div>
@endif
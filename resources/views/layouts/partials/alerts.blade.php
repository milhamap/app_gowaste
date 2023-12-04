@if (session('success'))
<div class="alert alert-success tengah" role="alert">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger tengah" role="alert">
    {{ session('error') }}
</div>
@endif
@if (session('info'))
<div class="alert alert-info tengah" role="alert">
    {{ session('info') }}
</div>
@endif

@if (session('message'))
    <div class="bg-success text-white p-3 mb-2">{{ session('message') }}</div>
@endif

@error('email')
    <div class="bg-danger text-white p-3 mb-2">{{ $message }}</div>
@endif
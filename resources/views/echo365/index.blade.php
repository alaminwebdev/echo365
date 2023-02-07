<h1>Hello from echo365</h1>

@php
    echo Auth::guard('admin')->user();
@endphp
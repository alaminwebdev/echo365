<!DOCTYPE html>
<html lang="en">
{{-- header file --}}
@include('admin.partials.head')

<body>
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/logo.png') }}" alt="Logo" height="60" width="60">
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    {{-- JS files --}}
    @include('admin.partials.scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
{{-- head file --}}
@include('echo365.partials.head')
<body>
    {{-- header file --}}
    @include('echo365.partials.header')

    {{-- content file --}}
    @yield('content')


    @include('echo365.partials.footer')

    {{-- <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div> --}}

    <div id="loader">
        <div class="spinner-border spinner" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- All Javascripts -->
    @include('echo365.partials.scripts')

</body>

</html>

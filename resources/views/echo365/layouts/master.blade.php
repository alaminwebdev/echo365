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

    <div class="copyright">
        Copyright 2022, Alamin. All Rights Reserved.
    </div>

    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>

    <!-- All Javascripts -->
    @include('echo365.partials.scripts')

</body>

</html>

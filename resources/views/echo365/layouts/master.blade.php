<!DOCTYPE html>
<html lang="en">
{{-- head file --}}
@include('echo365.partials.head')
<body>
    {{-- header file --}}
    @include('echo365.partials.header')

    {{-- content file --}}
    @yield('content')
    
    <div class="ad-section-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href=""><img src="uploads/ad-1.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>

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

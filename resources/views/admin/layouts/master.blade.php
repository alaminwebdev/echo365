<!DOCTYPE html>
<html lang="en">
{{-- header file --}}
@include('admin.partials.head')

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('dist/img/logo.png') }}" alt="Logo" height="60" width="60">
        </div>

        @include('admin.partials.header')
        @include('admin.partials.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-12 ">
                            <h1 class="m-0">@yield('title')</h1>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.content-header -->
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
    {{-- JS files --}}
    @include('admin.partials.scripts')
</body>

</html>

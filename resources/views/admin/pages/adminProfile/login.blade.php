@extends('admin.layouts.secondary')
@section('title', 'Login')
@section('content')
    <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 mx-auto">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible">
                <i class="icon fas fa-check"></i>
                {{ session('success') }}
            </div>
        @endif
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Login Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.login.submit') }}" method="post" class="m-0">
                @csrf
                <div class="card-body">
                    @error('fail')
                        <div class="alert alert-danger alert-dismissible">
                            <i class="icon fas fa-ban"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control @error('email') is-invalid @enderror "
                                placeholder="Email" name="email" value="{{ old('email') }}">

                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('password') is-invalid @enderror "
                                placeholder="Password" name="password">
                            @error('password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-sm-2 col-sm-10">
                            <a href="{{ route('admin.forgot.password') }}" class="text-danger">Forget password ?</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Sign in</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
@endsection

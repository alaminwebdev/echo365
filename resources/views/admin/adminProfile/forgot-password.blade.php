@extends('admin.layouts.secondary')
@section('title', 'Forgot Password')
@section('content')
    <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 mx-auto">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Forgot Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.forgot.submit') }}" method="post" class="m-0">
                @csrf
                <div class="card-body">
                    @error('fail')
                        <div class="alert alert-danger">
                            <i class="icon fas fa-ban"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif
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
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="{{ route('admin.login') }}" class="btn btn-info mr-3">Back</a>
                    <button type="submit" class="btn btn-success">Send Email</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
@endsection

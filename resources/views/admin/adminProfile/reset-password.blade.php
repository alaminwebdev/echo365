@extends('admin.layouts.secondary')
@section('title', 'Reset Password')
@section('content')
    <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 mx-auto">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Password Reset Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.reset.submit') }}" method="post" class="m-0">
                @csrf
                <div class="card-body">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
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
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Retype Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control @error('rt-password') is-invalid @enderror "
                                placeholder="Password" name="rt-password">
                            @error('rt-password')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
@endsection

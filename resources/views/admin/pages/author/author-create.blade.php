@extends('admin.layouts.master')

@section('title', 'Author')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    {{-- Show all field error in one section --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-lg-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Create Author</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('admin.author.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter your name" name="name" value="{{ old('name') }} ">

                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter email" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password"
                                                name="password_confirmation">

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="Male">
                                                    Male</option>
                                                <option value="Female">
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" name="dob"
                                                class="form-control @error('dob') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Upload your image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image"
                                                class="@error('image') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

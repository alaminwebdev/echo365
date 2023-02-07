@extends('admin.layouts.master')

@section('title', 'Profile')

@php
    $admin = Auth::guard('admin')->user();
@endphp

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-info">
                            <h3 class="widget-user-username">{{ $admin->name }}</h3>
                            <h5 class="widget-user-desc">{{ $admin->email }}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle elevation-2" src="{{ asset('uploads/' . $admin->image) }}"
                                alt="User Avatar">
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Gender</h5>
                                        <span class="description-text">{{ $admin->gender }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Date of Birth</h5>
                                        <span class="description-text">{{ date('d-M-Y', strtotime($admin->dob)) }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">Updated at</h5>
                                        <span class="description-text">{{ date('d-M-Y', strtotime($admin->updated_at)) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card card-success">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <i class="icon fas fa-check"></i>
                                {{ session('success') }}
                            </div>
                        @endif
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
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('admin.profile.submit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name" name="name" value="{{ $admin->name }} ">
                        
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter email" name="email" value="{{ $admin->email }}">
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
                                                <option value="Male" @if ($admin->gender == 'Male') selected @endif>
                                                    Male</option>
                                                <option value="Female" {{ $admin->gender == 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" name="dob"
                                                class="form-control @error('dob') is-invalid @enderror" value="{{ date('Y-m-d', strtotime($admin->dob))}}">
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

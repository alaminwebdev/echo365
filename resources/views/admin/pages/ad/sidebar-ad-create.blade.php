@extends('admin.layouts.master')

@section('title', 'Sidebar Advertisement')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.ad.sidebar.store') }}" method="post" enctype="multipart/form-data">
                @csrf
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
                    <div class="col-lg-8 ">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Sidebar Advertisement</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Upload Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="sidebar_ad">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ad URL</label>
                                    <input type="text" class="form-control @error('sidebar_ad_url') is-invalid @enderror"
                                        placeholder="Enter URL" name="sidebar_ad_url"
                                        value="{{ old('sidebar_ad_url') }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="sidebar_ad_status">
                                                <option value="show">
                                                    Show
                                                </option>
                                                <option value="hide" >
                                                    Hide
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control" name="sidebar_ad_loaction">
                                                <option value="top">Top
                                                </option>
                                                <option value="down">Down
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

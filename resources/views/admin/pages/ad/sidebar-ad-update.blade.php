@extends('admin.layouts.master')

@section('title', 'Sidebar Advertisement Update')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.ad.sidebar.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $ad_data->id }}">
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
                                <h3 class="card-title">Sidebar Advertisement Update</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/' . $ad_data->sidebar_ad) }}" class="img-fluid rounded"
                                        alt="sideber image"
                                        style=" max-width:50% ">
                                    </div>    
                                </div>
                                <div class="form-group">
                                    <label>Upload Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="sidebar_ad">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Advertisement URL</label>
                                    <input type="text" class="form-control @error('sidebar_ad_url') is-invalid @enderror"
                                        placeholder="Enter URL" name="sidebar_ad_url"
                                        value="{{ $ad_data->sidebar_ad_url }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="sidebar_ad_status">
                                                <option value="show" @if ($ad_data->sidebar_ad_status == 'show') selected @endif>
                                                    Show
                                                </option>
                                                <option value="hide" @if ($ad_data->sidebar_ad_status == 'hide') selected @endif>
                                                    Hide
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control" name="sidebar_ad_loaction">
                                                <option value="top" @if ($ad_data->sidebar_ad_loaction == 'top') selected @endif>Top
                                                </option>
                                                <option value="down" @if ($ad_data->sidebar_ad_loaction == 'down') selected @endif>
                                                    Down
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

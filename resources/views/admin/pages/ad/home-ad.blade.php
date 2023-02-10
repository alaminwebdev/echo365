@extends('admin.layouts.master')

@section('title', 'Home Advertisement')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- form start -->
            <form action="{{ route('admin.ad.home.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-12">
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
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Above Search Advertisement</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Existing Photo</label>
                                    <div class="">
                                        <img src="{{ asset('uploads/'.$home_ad_data->above_search_ad) }}" alt="ad_image" class="img-fluid rounded">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="above_search_ad"
                                                class="@error('above_search_ad') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ad URL</label>
                                    <input type="text"
                                        class="form-control @error('above_search_ad_url') is-invalid @enderror"
                                        placeholder="Enter URL" name="above_search_ad_url" value="{{ $home_ad_data->above_search_ad_url }}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="above_search_ad_status">
                                        <option value="show" @if($home_ad_data->above_search_ad_status == 'show') selected @endif>Show</option>
                                        <option value="hide" @if($home_ad_data->above_search_ad_status == 'hide') selected @endif>Hide</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Above Footer Advertisement</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Existing Photo</label>
                                    <div class="">
                                        <img src="{{ asset('uploads/'.$home_ad_data->above_footer_ad) }}" alt="ad_image" class="img-fluid rounded" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="above_footer_ad"
                                                class="@error('above_footer_ad') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ad URL</label>
                                    <input type="text"
                                        class="form-control @error('above_footer_ad_url') is-invalid @enderror"
                                        placeholder="Enter URL" name="above_footer_ad_url" value="{{ $home_ad_data->above_footer_ad_url }}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="above_footer_ad_status">
                                        <option value="show" @if($home_ad_data->above_footer_ad_status == 'show') selected @endif>Show</option>
                                        <option value="hide" @if($home_ad_data->above_footer_ad_status == 'hide') selected @endif>Hide</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

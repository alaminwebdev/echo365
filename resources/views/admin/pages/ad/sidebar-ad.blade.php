@extends('admin.layouts.master')

@section('title', 'Sidebar Advertisement')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center ">
                <div class="col-lg-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <i class="icon fas fa-check"></i>
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header text-right">
                            <a type="button" class="btn bg-gradient-success"href="{{ route('admin.ad.sidebar.create') }}">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover "
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Ad URL</th>
                                        <th>Ad Status</th>
                                        <th>Ad Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sidebar_ad_data as $ad)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('uploads/'.$ad->sidebar_ad) }}" class="img-fluid rounded" alt="sidebar_ad_image" style="width: 90px
                                                ">
                                            </td>
                                            <td>{{ $ad->sidebar_ad_url }}</td>
                                            <td>{{ $ad->sidebar_ad_status }}</td>
                                            <td>{{ $ad->sidebar_ad_loaction }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('admin.ad.sidebar.show', $ad->id) }}" class="btn btn-sm btn-info">
                                                        <i class="icon fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.ad.sidebar.delete', $ad->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this AD ?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

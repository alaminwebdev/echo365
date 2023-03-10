@extends('admin.layouts.master')

@section('title', 'Photos')

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
                            <a type="button" class="btn bg-gradient-success"href="{{ route('photo.create') }}">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover "
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Caption</th>
                                        <th>Creation Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($photos as $photo)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('uploads/'.$photo->photo) }}" class="img-fluid rounded" alt="" style="width: 90px
                                                ">
                                            </td>
                                            <td>{{ $photo->caption }}</td>
                                            <td>{{ $photo->created_at }}</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('photo.show', $photo->id) }}" class="btn btn-sm btn-info">
                                                        <i class="icon fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('photo.destroy', $photo->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this Photo ?')">
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

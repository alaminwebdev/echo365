@extends('admin.layouts.master')

@section('title', 'Authors')

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
                            <a type="button" class="btn bg-gradient-success"href="{{ route('admin.author.create') }}">
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
                                        <th>Author Name</th>
                                        <th>Author Email</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authors as $author)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('uploads/'.$author->image) }}" class="img-fluid rounded" alt="" style="width: 90px
                                                ">
                                            </td>
                                            <td>{{ $author->name }}</td>
                                            <td>{{ $author->email }}</td>
                                            <td>fdhgfhfh</td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('admin.author.show', $author->id) }}" class="btn btn-sm btn-info">
                                                        <i class="icon fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.author.destroy', $author->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this Author ?')">
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

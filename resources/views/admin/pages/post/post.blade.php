@extends('admin.layouts.master')

@section('title', 'Posts')

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
                            <a type="button" class="btn bg-gradient-success"href="{{ route('admin.post.create') }}">
                                <i class="fas fa-plus"></i> Add
                            </a>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover "
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post Image</th>
                                        <th>Post Title</th>
                                        <th>Post Author</th>
                                        <th>Sub Category</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset('uploads/'.$post->image) }}" class="img-fluid rounded" alt="" style="width: 90px
                                                ">
                                            </td>
                                            <td>{{ $post->title }} {!! $post->is_featured ? '<span class="badge bg-success">Featured</span>' : '' !!}</td>
                                            <td>{{ Auth::guard('admin')->user()->name }}</td>
                                            <td>
                                                {{ $post->rSubCategory->subcategory_name }}
                                            </td>
                                            <td>
                                                {{ $post->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('admin.post.show', $post->id) }}" class="btn btn-sm btn-info">
                                                        <i class="icon fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.post.destroy', $post->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this Post ?')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-0">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

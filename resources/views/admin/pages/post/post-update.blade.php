@extends('admin.layouts.master')

@section('title', 'Post')

@section('content')
    <section class="content">
        <div class="container-fluid">
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
                <div class="col-lg-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Update Post</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('admin.post.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter title" name="title" value="{{ $post->title }} ">

                                </div>
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea class="form-control @error('detail') is-invalid @enderror" rows="5" style="height: 124px;"
                                        name="detail">{{ $post->detail }}</textarea>

                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Existing Photo</label>
                                            <div>
                                                <img src="{{ asset('uploads/' . $post->image) }}" class="img-fluid rounded"
                                                    style=" max-width:50% ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Upload image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image"
                                                        class="@error('image') is-invalid @enderror">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is sharable ? </label>
                                            <select class="form-control" name="is_share">
                                                <option value="1" @if ($post->is_share == 1) selected @endif>
                                                    Yes</option>
                                                <option value="0" @if ($post->is_share == 0) selected @endif>
                                                    No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is commentable ? </label>
                                            <select class="form-control" name="is_comment">
                                                <option value="1" @if ($post->is_comment == 1) selected @endif>
                                                    Yes</option>
                                                <option value="0" @if ($post->is_comment == 0) selected @endif>
                                                    No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="subcategory_id">
                                                @foreach ($subcategoris as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        @if ($subcategory->id == $post->subcategory_id) selected @endif>
                                                        {{ $subcategory->subcategory_name }} -
                                                        {{ $subcategory->rCategory->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group table-responsive">
                                            <label>Existing Tag</label>
                                            <table class="table table-sm text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Tag</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tags as $tag)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $tag->tag }}</td>
                                                            <td>
                                                                <a href="{{ route('admin.tag.destroy', [$tag->id, $post->id]) }}"
                                                                    class="btn btn-sm btn-danger"
                                                                    onclick="return confirm('Are you sure to delete this Post ?')">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Add Tag</label>
                                    <input type="text" data-role="tagsinput" name="tags"
                                        placeholder="Add tags & press enter " />
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
@endsection

@extends('admin.layouts.master')

@section('title', 'Post')

@section('content')
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
                            <h3 class="card-title">Create Post</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        placeholder="Enter title" name="title" value="{{ old('title') }} ">

                                </div>
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea class="form-control @error('detail') is-invalid @enderror" rows="5" placeholder="Enter ..."
                                        style="height: 124px;" name="detail"></textarea>
                                </div>
                                <div class="row">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="subcategory_id">
                                                @foreach ($subcategoris as $subcategory)
                                                    <option value="{{ $subcategory->id }}">
                                                        {{ $subcategory->subcategory_name }} -
                                                        {{ $subcategory->rCategory->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is sharable ? </label>
                                            <select class="form-control" name="is_share">
                                                <option value="1">
                                                    Yes</option>
                                                <option value="0">
                                                    No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is commentable ? </label>
                                            <select class="form-control" name="is_comment">
                                                <option value="1">
                                                    Yes</option>
                                                <option value="0">
                                                    No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Is Featured ?</label>
                                            <select name="is_featured" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Add Tag</label>
                                            <input type="text" value="" data-role="tagsinput" name="tags"
                                                placeholder="Add tags & press enter " />
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
@endsection

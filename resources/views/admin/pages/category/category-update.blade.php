@extends('admin.layouts.master')

@section('title', 'Category')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.category.update') }}" method="post">
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">
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
                                <h3 class="card-title">Update Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                        placeholder="Enter Name" name="category_name" value="{{ $category->category_name }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="category_show">
                                                <option value="show" @if ($category->category_show == 'show') selected @endif>
                                                    Show
                                                </option>
                                                <option value="hide" @if ($category->category_show == 'hide') selected @endif>
                                                    Hide
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Category Order</label>
                                            <input type="number"
                                                class="form-control @error('category_order') is-invalid @enderror"
                                                placeholder="Enter Order" name="category_order"
                                                value="{{ $category->category_order }}">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

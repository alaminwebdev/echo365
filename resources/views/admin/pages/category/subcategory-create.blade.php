@extends('admin.layouts.master')

@section('title', 'Sub Category')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.subcategory.store') }}" method="post">
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
                                <h3 class="card-title">Create Sub Category</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Sub Category Name</label>
                                    <input type="text"
                                        class="form-control @error('subcategory_name') is-invalid @enderror"
                                        placeholder="Enter Name" name="subcategory_name"
                                        value="{{ old('subcategory_name') }}">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="subcategory_show">
                                                <option value="show">
                                                    Show
                                                </option>
                                                <option value="hide">
                                                    Hide
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Sub Category Order</label>
                                            <input type="number"
                                                class="form-control @error('subcategory_order') is-invalid @enderror"
                                                placeholder="Enter Order" name="subcategory_order"
                                                value="{{ old('subcategory_order') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach ($categories as $row)
                                            <option value="{{ $row->id }}">
                                                {{ $row->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
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

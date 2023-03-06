@extends('admin.layouts.master')

@section('title', 'Photo')

@section('content')
    <!-- Main content -->
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
                            <h3 class="card-title">Add Photo</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('admin.photo.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Upload Photo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo"
                                                class="@error('photo') is-invalid @enderror">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Caption</label>
                                    <textarea class="form-control @error('caption') is-invalid @enderror" rows="5" placeholder="Enter ..."
                                        style="height: 124px;" name="caption">{{ old('caption') }}</textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

@extends('admin.layouts.master')

@section('title', 'Send Email')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('subscribers.email.submit') }}" method="post">
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
                                <h3 class="card-title">Send email to all subscribers</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                        placeholder="Enter subject" name="subject" value="{{ old('subject') }}">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" rows="5" placeholder="Enter message"
                                        style="height: 124px;" name="message"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

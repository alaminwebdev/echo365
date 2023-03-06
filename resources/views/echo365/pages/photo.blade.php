@extends('echo365.layouts.master')
@section('title', 'Photos')
@section('content')
    <section class="subcategory-content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center pb-4 mb-4 border-bottom">
                                    <h3 class="fst-italic ">
                                        Photos
                                    </h3>
                                </div>
                            </div>
                            @foreach ($photos as $photo)
                                <div class="col-md-6">
                                    <div
                                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                        <div class="col py-4 ps-4 position-relative featured-post-text">
                                            <h3 class="mb-1">{{ $photo->caption }}</h3>
                                            <div class="mb-1 text-muted">
                                                {{ date('h:i a, d F', strtotime($photo->updated_at)) }}</div>
                                            <a href="#"
                                                class="stretched-link post-link text-dark">Continue reading</a>
                                            <div class="featured-post-image d-none d-lg-block">
                                                <img src="{{ asset('uploads/' . $photo->photo) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $photos->onEachSide(2)->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- @include('echo365.section.sidebar-content') --}}
                </div>
            </div>
        </div>
    </section>
@endsection

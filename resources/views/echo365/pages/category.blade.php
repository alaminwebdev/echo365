@extends('echo365.layouts.master')
@section('title', 'Category')
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
                                        @forelse ($posts as $post)
                                            {{ $post->rSubCategory->subcategory_name }}
                                            @break($loop->remaining)
                                            @empty
                                            No post found !
                                        @endforelse
                                    </h3>
                                </div>
                            </div>
                            @forelse ($posts as $post)
                                <div class="col-12">
                                    <div
                                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                        <div class="col py-4 ps-4 position-relative featured-post-text">
                                            <strong
                                                class="d-inline-block mb-2 fst-italic text-success">{{ $post->rSubcategory->subcategory_name }}</strong>
                                            <h3 class="mb-1">{{ $post->title }}</h3>
                                            <div class="mb-1 text-muted">
                                                {{ date('h:i a, d F', strtotime($post->updated_at)) }}</div>
                                            <a href="{{ route('echo365.post', $post->id) }}"
                                                class="stretched-link post-link text-dark">Continue reading</a>
                                            <div class="featured-post-image d-none d-lg-block">
                                                <img src="{{ asset('uploads/' . $post->image) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="mb-4 ">There is no post found in this category !</p>
                            @endforelse
                            {{ $posts->onEachSide(2)->links() }}
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

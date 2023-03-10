@extends('echo365.layouts.master')
@section('title', 'Category')
@section('content')
    <section class="subcategory-content mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center pb-4 mb-4 border-bottom">
                                    <h3 class="fst-italic ">
                                        {{ $name }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            @forelse ($posts as $post)
                                <div class="col-md-4">
                                    <div class="p-4 mb-4  text-white category-post rounded"
                                        style="background-image: url('{{ asset('uploads/' . $post->image) }}');">
                                        <div class="ps-0 pe-4 pt-4">
                                            <h4 class="fst-italic">{{ Str::limit($post->title, 50, '...') }}</h4>
                                            <div class="mb-1 text- text-white">
                                                {{ date('h:i a, d F', strtotime($post->updated_at)) }}</div>
                                            <p class="lead mb-0">
                                                <a href="{{ route('echo365.post', $post->id) }}"
                                                    class="text-white post-link stretched-link">Continue reading...</a>
                                            </p>
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
            </div>
        </div>
    </section>
@endsection

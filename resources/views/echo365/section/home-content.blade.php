<section class="home-banner">
    <div class="container">
        <div class="row">
            @foreach ($latest_post as $post)
                <div class="col-12">
                    <div class="px-4 py-5 mb-4  text-white latest-post rounded"
                        style="background-image: url('{{ asset('uploads/' . $post->image) }}');">
                        <div class="col-lg-8 px-0 py-4">
                            <h1 class="display-6 fst-italic">{{ $post->title }}</h1>
                            <p class="lead my-3">{{ Str::words($post->detail, 20, '...') }}</p>
                            <p class="lead mb-0"><a href="{{ route('echo365.post', $post->id) }}"
                                    class="text-white post-link">Continue reading...</a></p>
                        </div>
                    </div>
                </div>
                {{-- skip the remaining post using break statement --}}
                @break($loop->remaining)
            @endforeach
        </div>

    </div>
</section>
<section class="home-latest">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Latest
                </h3>
            </div>

            @foreach ($latest_post as $post)
                {{-- skip the first post using continue statement --}}
                @continue($loop->first)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col py-4 ps-4 position-relative latest-post-text">
                            <strong
                                class="d-inline-block mb-2 fst-italic text-success">{{ $post->rSubCategory->subcategory_name }}</strong>
                            <h3 class="mb-1">{{ $post->title }}</h3>
                            <div class="mb-1 text-muted">{{ date('d-M-Y', strtotime($post->updated_at)) }}</div>
                            <p class="card-text mb-auto">{{ Str::words($post->detail, 10, '...') }}</p>
                            <a href="{{ route('echo365.post', $post->id) }}"
                                class="stretched-link post-link text-dark">Continue reading</a>
                            <div class="latest-post-image d-none d-lg-block">
                                <img src="{{ asset('uploads/' . $post->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</section>


<section class="home-featured">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Featured
                </h3>
            </div>
            @forelse ($featured_post as $post)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col py-4 ps-4 position-relative featured-post-text">
                            <strong
                                class="d-inline-block mb-2 fst-italic text-success">{{ $post->rSubCategory->subcategory_name }}</strong>
                            <h3 class="mb-1">{{ $post->title }}</h3>
                            <div class="mb-1 text-muted">{{ date('d-M-Y', strtotime($post->updated_at)) }}</div>
                            <a href="{{ route('echo365.post', $post->id) }}"
                                class="stretched-link post-link text-dark">Continue reading</a>
                            <div class="featured-post-image d-none d-lg-block">
                                <img src="{{ asset('uploads/' . $post->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="mb-4 ">No featured post</p>
            @endforelse

        </div>
    </div>
</section>


<section class="search-section mb-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group ">
                    <input type="text" name="" class="form-control" placeholder="Title or Description">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="" class="form-select">
                        <option value="">Select Category</option>
                        <option value="">Sports</option>
                        <option value="">National</option>
                        <option value="">Lifestyle</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select name="" class="form-select">
                        <option value="">Select SubCategory</option>
                        <option value="">Football</option>
                        <option value="">Cricket</option>
                        <option value="">Baseball</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>
</section>

<section class="home-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($subcategoris as $subcategory)
                    @if (count($subcategory->rPost) == 0)
                        @continue
                    @endif
                    <section class="home-subcategories">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div
                                        class="d-flex justify-content-between align-items-center pb-4 mb-4 border-bottom">
                                        <h3 class="fst-italic ">
                                            {{ $subcategory->subcategory_name }}

                                        </h3>
                                        <a class="btn btn-primary"
                                            href="{{ route('echo365.subcategory', $subcategory->id) }}"
                                            role="button">All News</a>
                                    </div>
                                </div>
                                @forelse ($subcategory->rPost as $post)
                                    @break($loop->iteration == 5)
                                    <div class="col-md-6">
                                        <div
                                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                            <div class="col py-4 ps-4 position-relative featured-post-text">
                                                <strong
                                                    class="d-inline-block mb-2 fst-italic text-success">{{ $subcategory->subcategory_name }}</strong>
                                                <h3 class="mb-1">{{ $post->title }}</h3>
                                                <div class="mb-1 text-muted">
                                                    {{ date('d-M-Y', strtotime($post->updated_at)) }}</div>
                                                <a href="{{ route('echo365.post', $post->id) }}"
                                                    class="stretched-link post-link text-dark">Continue reading</a>
                                                <div class="featured-post-image d-none d-lg-block">
                                                    <img src="{{ asset('uploads/' . $post->image) }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="mb-4 ">No post yet</p>
                                @endforelse
                            </div>
                        </div>
                    </section>
                @endforeach
            </div>
            {{-- <div class="col-lg-4">
                @include('echo365.section.sidebar-content')
            </div> --}}
        </div>
    </div>
</section>

<section class="home-banner">
    <div class="container">
        <div class="row">
            @foreach ($latest_post as $post)
                <div class="col-12">
                    <div class="p-5 p-md-5 mb-4  text-white latest-post rounded"
                        style="background-image: url('{{ asset('uploads/' . $post->image) }}');">
                        <div class="col-md-6 px-0">
                            <h1 class="display-6 fst-italic">{{ $post->title }}</h1>
                            <p class="lead my-3">{{ Str::words($post->detail, 15, '...') }}</p>
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
                            <h3 class="mb-0">{{ $post->title }}</h3>
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
                            <h3 class="mb-0">{{ $post->title }}</h3>
                            <div class="mb-1 text-muted">{{ date('d-M-Y', strtotime($post->updated_at)) }}</div>
                            <p class="card-text mb-auto">{{ Str::words($post->detail, 10, '...') }}</p>
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


<div class="home-main">
    <div class="container">
        <div class="row g-2">
            <div class="col-lg-8 col-md-12 left">
                <div class="inner">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="uploads/n1.jpg" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">Politics</span>
                                </div>
                                <h2><a href="">Top five ranked teams in world lined up to take part in
                                        competition</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">Paul David</a>
                                    </div>
                                    <div class="date">
                                        <a href="">10 Jan, 2022</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="inner inner-right">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="uploads/n2.jpg" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">Politics</span>
                                </div>
                                <h2><a href="">Top five ranked teams in world lined up to take part in
                                        competition</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">Paul David</a>
                                    </div>
                                    <div class="date">
                                        <a href="">10 Jan, 2022</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inner inner-right">
                    <div class="photo">
                        <div class="bg"></div>
                        <img src="uploads/n3.jpg" alt="">
                        <div class="text">
                            <div class="text-inner">
                                <div class="category">
                                    <span class="badge bg-success badge-sm">Politics</span>
                                </div>
                                <h2><a href="">Top five ranked teams in world lined up to take part in
                                        competition</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">Paul David</a>
                                    </div>
                                    <div class="date">
                                        <a href="">10 Jan, 2022</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

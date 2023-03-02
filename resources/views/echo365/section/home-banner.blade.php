<section class="home-banner my-2">
    <div class="container">
        <div class="p-4 p-md-5 mb-4  text-white featured-post rounded"
            style="background-image: url('{{ asset('uploads/' . $featured_post[0]->image) }}');">
            <div class="col-md-6 px-0">
                <h1 class="display-6 fst-italic">{{ $featured_post[0]->title }}</h1>
                <p class="lead my-3">{{ Str::words($featured_post[0]->detail, 15, '...') }}</p>
                <p class="lead mb-0"><a href="{{ route('echo365.post', $featured_post[0]->id) }}"
                        class="text-white post-link">Continue reading...</a></p>

            </div>
        </div>
    </div>
</section>
<section class="home-featured">
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col py-4 ps-4 position-relative featured-post-text">
                        <strong class="d-inline-block mb-2 text-primary">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                        <div class="featured-post-image d-none d-lg-block border">
                            <img src="{{ asset('uploads/'.$featured_post[0]->image) }}"  alt="">
                        </div>
                    </div>
                </div>
            </div>
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

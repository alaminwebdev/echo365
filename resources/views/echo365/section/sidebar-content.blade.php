<div>


    {{-- ad-sidebar top --}}
    @foreach ($global_sidebar_top_ad as $ad)
        @if ($ad->sidebar_ad_status == 'show')
            <div class="ad-sidebar mb-4">
                @if ($ad->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_top_ad" class="img-fluid rounded">
                @else
                    <a href="{{ asset('uploads/' . $ad->sidebar_ad_url) }}">
                        <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_down_ad"
                            class="img-fluid rounded">
                    </a>
                @endif
            </div>
        @endif
    @endforeach


    <div class=" card p-4 mb-4 ">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active me-4" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <div class="card flex-row mt-4 border-0">
                    <div class="post-image">
                        <img src="{{ asset('uploads/post1676385447.webp') }}" class="img-fluid rounded"
                            alt="...">
                    </div>
                    <div class="card-body p-2">
                        <p><a href="#" class="stretched-link text-dark text-decoration-none fs-6">A well-known
                                quote, contained in a blockquote element.</a></p>
                        <footer class="blockquote-footer m-0 fs-7">Read More</footer>
                    </div>
                </div>
                <div class="card flex-row mt-4 border-0">
                    <div class="post-image">
                        <img src="{{ asset('uploads/20230205155421.png') }}" class="img-fluid rounded"
                            alt="...">
                    </div>
                    <div class="card-body p-2">
                        <p><a href="#" class="stretched-link text-dark text-decoration-none fs-6">A well-known
                                quote, contained in a blockquote element.</a></p>
                        <footer class="blockquote-footer m-0 fs-7">Read More</footer>
                    </div>
                </div>
                <div class="card flex-row mt-4 border-0">
                    <div class="post-image">
                        <img src="{{ asset('uploads/post1676385447.webp') }}" class="img-fluid rounded"
                            alt="...">
                    </div>
                    <div class="card-body p-2">
                        <p><a href="#" class="stretched-link text-dark text-decoration-none fs-6">A well-known
                                quote, contained in a blockquote element.</a></p>
                        <footer class="blockquote-footer m-0 fs-7">Read More</footer>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <div class="card flex-row mt-4 border-0">
                    <div class="post-image">
                        <img src="{{ asset('uploads/20230205155421.png') }}" class="img-fluid rounded"
                            alt="...">
                    </div>
                    <div class="card-body p-2">
                        <p><a href="#" class="stretched-link text-dark text-decoration-none fs-6">A well-known
                                quote, contained in a blockquote element.</a></p>
                        <footer class="blockquote-footer m-0 fs-7">Read More</footer>
                    </div>
                </div>
                <div class="card flex-row mt-4 border-0">
                    <div class="post-image">
                        <img src="{{ asset('uploads/20230205155421.png') }}" class="img-fluid rounded"
                            alt="...">
                    </div>
                    <div class="card-body p-2">
                        <p><a href="#" class="stretched-link text-dark text-decoration-none fs-6">A well-known
                                quote, contained in a blockquote element.</a></p>
                        <footer class="blockquote-footer m-0 fs-7">Read More</footer>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="p-4 mb-4 bg-light rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">Customize this section to tell your visitors a little bit about your
            publication, writers, content, or something else entirely. Totally up to you.</p>
    </div>

    <div class="p-4 bg-light rounded mb-4">
        <h4 class="fst-italic mb-2">Archives</h4>
        <div class="archive">
            <select name="" class="form-select">
                <option value="">Select Month</option>
                <option value="">February 2022</option>
                <option value="">January 2022</option>
                <option value="">December 2021</option>
                <option value="">November 2021</option>
                <option value="">October 2021</option>
                <option value="">September 2021</option>
                <option value="">August 2021</option>
                <option value="">July 2021</option>
            </select>
        </div>
    </div>

    <div class="p-4 bg-light rounded mb-4">
        <h4 class="fst-italic mb-2">Tag</h4>
        <div class="tag">
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">business</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">river</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">politics</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">google</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">tree</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">airplane</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">tiles</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">recent</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">brand</span></a>
            </div>
            <div class="tag-item">
                <a href=""><span class="badge bg-secondary">election</span></a>
            </div>
        </div>
    </div>

    <div class="p-4 bg-light rounded mb-4">
        <h4 class="fst-italic mb-2">Live Channel - RT News</h4>
        <div class="live-channel-item">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/V0I5eglJMRI"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>

    <div class="p-4 bg-light rounded mb-4">
        <h4 class="fst-italic bg-light rounded">Elsewhere</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>
    {{-- ad-sidebar down --}}
    @foreach ($global_sidebar_down_ad as $ad)
        @if ($ad->sidebar_ad_status == 'show')
            <div class="ad-sidebar mb-4">
                @if ($ad->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_down_ad"
                        class="img-fluid rounded">
                @else
                    <a href="{{ asset('uploads/' . $ad->sidebar_ad_url) }}">
                        <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_down_ad"
                            class="img-fluid rounded">
                    </a>
                @endif
            </div>
        @endif
    @endforeach
</div>

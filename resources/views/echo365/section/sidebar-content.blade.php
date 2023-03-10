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


    <div class="card p-4 mb-4 shadow-sm">
        <ul class="nav nav-pills border-bottom pb-4" id="pills-tab" role="tablist">
            <li class="" role="presentation">
                <button class=" active me-2 btn btn-sm btn-outline-success" id="pills-popular-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular"
                    aria-selected="true">Popular</button>
            </li>
            <li class="" role="presentation">
                <button class="btn btn-sm btn-outline-success" id="pills-latest-tab" data-bs-toggle="pill" data-bs-target="#pills-latest"
                    type="button" role="tab" aria-controls="pills-latest" aria-selected="false">Latest</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-popular" role="tabpanel"
                aria-labelledby="pills-popular-tab" tabindex="0">
                @forelse ($popularPost as $post)
                    <div class="card flex-row mt-4 border-0">
                        <div class="post-image">
                            <img src="{{ asset('uploads/' . $post->image) }}" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="card-body p-2">
                            <p class="mb-1">
                                <a href="{{ route('echo365.post', $post->id) }}" class="stretched-link text-dark text-decoration-none">
                                    {{ Str::limit($post->title, 50, '...') }}
                                </a>
                            </p>
                            <footer class="blockquote-footer m-0">Read More</footer>
                        </div>
                    </div>
                @empty
                    <div class="card flex-row mt-4 border-0">
                        <div class="card-body p-2">
                            <p><a href="#" class="text-dark text-decoration-none">No post found !</a></p>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="tab-pane fade" id="pills-latest" role="tabpanel" aria-labelledby="pills-latest-tab"
                tabindex="0">
                @forelse ($latest_post as $post)
                    <div class="card flex-row mt-4 border-0">
                        <div class="post-image">
                            <img src="{{ asset('uploads/' . $post->image) }}" class="img-fluid rounded" alt="...">
                        </div>
                        <div class="card-body p-2">
                            <p class="mb-1">
                                <a href="{{ route('echo365.post', $post->id) }}" class="stretched-link text-dark text-decoration-none">
                                    {{ Str::limit($post->title, 50, '...') }}
                                </a>
                            </p>
                            <footer class="blockquote-footer m-0">Read More</footer>
                        </div>
                    </div>
                @empty
                    <div class="card flex-row mt-4 border-0">
                        <div class="card-body p-2">
                            <p><a href="#" class="text-dark text-decoration-none">No post found !</a></p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="card p-4 mb-4 shadow-sm">
        <h4 class="fst-italic fw-bold mb-4">Archives</h4>
        <div class="archive text-center">
            <form action="{{ route('echo365.month') }}" method="post" class="d-flex flex-column flex-sm-row w-100 gap-2">
                @csrf
                <select name="month" class="form-select-sm" style="width: inherit">
                    <option value="">Select Month</option>
                    @foreach($archivedDate as $data){
                        <option value="{{ $data->month }}">{{ $data->month_name.'-'.$data->year }}</option>
                    }
                    @endforeach
                </select>
                <button type="submit" class="btn btn-success">Go</button>
            </form>
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

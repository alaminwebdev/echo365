<div class="position-sticky" style="top: 2rem;">
    <div class="p-4 mb-4 bg-light rounded">
        <h4 class="fst-italic">About</h4>
        <p class="mb-0">Customize this section to tell your visitors a little bit about your
            publication, writers, content, or something else entirely. Totally up to you.</p>
    </div>

    {{-- ad-sidebar top --}}
    @foreach ($global_sidebar_top_ad as $ad)
        @if ($ad->sidebar_ad_status == 'show')
            <div class="ad-sidebar mb-4">
                @if ($ad->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_top_ad" class="img-fluid rounded">
                @else
                    <a href="{{ asset('uploads/' . $ad->sidebar_ad_url) }}">
                        <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_down_ad" class="img-fluid rounded">
                    </a>
                @endif
            </div>
        @endif
    @endforeach

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
                    <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_down_ad" class="img-fluid rounded">
                @else
                    <a href="{{ asset('uploads/' . $ad->sidebar_ad_url) }}">
                        <img src="{{ asset('uploads/' . $ad->sidebar_ad) }}" alt="sidebar_down_ad" class="img-fluid rounded">
                    </a>
                @endif
            </div>
        @endif
    @endforeach
</div>

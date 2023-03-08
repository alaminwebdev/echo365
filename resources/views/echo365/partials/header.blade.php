<div class="container">
    <header class="lh-1 py-3 border-bottom">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 d-none d-sm-block  pt-1">
                <p> <i class="bi bi-calendar-fill pe-1"></i>Today : {{ date('d F,Y') }}</p>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="{{ route('echo365.home') }}">echo365</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <button type="button" class="btn btn-sm btn-light text-dark me-2">Login</button>
                <button type="button" class="btn btn-sm btn-primary me-2">Sign-up</button>
                <select class="form-select form-select-sm" style="display: inline; width:auto">
                    <option value="1">English</option>
                    <option value="2">Bangla</option>
                    <option value="3">Hindi</option>
                </select>
            </div>
        </div>
    </header>
</div>





<section class="ad-section-1 top-ad my-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                @if ($global_top_ad->top_ad_status == 'show')
                    <div class="ad-section-1 top-ad text-center">
                        @if ($global_top_ad->top_ad_url == '')
                            <img src="{{ asset('uploads/' . $global_top_ad->top_ad) }}" alt="top-ad"
                                class="img-fluid rounded">
                        @else
                            <a href="{{ $global_top_ad->top_ad_url }}"><img
                                    src="{{ asset('uploads/' . $global_top_ad->top_ad) }}" alt="top-ad"
                                    class="img-fluid rounded"></a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('echo365.home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('echo365.home') }}">Home</a>
                </li>
                @foreach ($navbars as $category)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" href="javascript:void(0)">{{ $category->category_name }}</a>
                        <ul class="dropdown-menu">
                            @foreach ($category->rSubCategory as $subcategory)
                                <li><a class="dropdown-item"
                                        href="{{ route('echo365.subcategory', $subcategory->id) }}">{{ $subcategory->subcategory_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('echo365.photos') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('echo365.photos') }}">Photos</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

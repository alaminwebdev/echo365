<header>
    <div class="px-3 py-2 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center align-items-center">
            <div class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto">
                <p> <i class="bi bi-calendar-fill"></i> Today: January 20, 2023</p>
            </div>

            <div class="text-end">
                <button type="button" class="btn btn-sm btn-light text-dark me-2">Login</button>
                <button type="button" class="btn btn-sm btn-primary me-2">Sign-up</button>
                <select class="form-select form-select-sm" style="display: inline; width:auto">
                    <option value="1">English</option>
                    <option value="2">Bangla</option>
                    <option value="3">Hindi</option>
                </select>
            </div>

        </div>
    </div>
</header>


<section>
    <div class="container my-2">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="logo">
                    <a href="{{ route('echo365.home') }}"
                        class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-decoration-none">
                        <h1>
                            <i class="bi bi-newspaper"></i>
                        </h1>
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                @if ($global_top_ad->top_ad_status == 'show')
                    <div class="ad-section-1 top-ad">
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

<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('echo365.home')? 'active' : '' }}" aria-current="page" href="{{ route('echo365.home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Sports</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Cricket</a></li>
                        <li><a class="dropdown-item" href="#">Football</a></li>
                        <li><a class="dropdown-item" href="#">Tenis</a></li>
                    </ul>

                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        National
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dhaka</a></li>
                        <li><a class="dropdown-item" href="#">Khulna</a></li>
                        <li><a class="dropdown-item" href="#">Sylhet</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


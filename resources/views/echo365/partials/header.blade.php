<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="today-text">Today: January 20, 2023</li>
                    <li class="email-text">contact@alamin.com</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">
                    <li class="menu"><a href="faq.html">FAQ</a></li>
                    <li class="menu"><a href="{{ route('echo365.about') }}">About</a></li>
                    <li class="menu"><a href="{{ route('echo365.contact') }}">Contact</a></li>
                    <li class="menu"><a href="login.html">Login</a></li>
                    <li>
                        <div class="language-switch">
                            <select name="">
                                <option value="">English</option>
                                <option value="">Hindi</option>
                                <option value="">Arabic</option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="heading-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <div class="logo">
                    <a href="{{ route('echo365.home') }}">
                        <img src="uploads/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-8">
                @if ($global_top_ad->top_ad_status == 'show')
                    <div class="ad-section-1 top-ad">
                        @if ($global_top_ad->top_ad_url == '')
                            <img src="{{ asset('uploads/' . $global_top_ad->top_ad) }}" alt="top-ad"
                                class="img-fluid">
                        @else
                            <a href="{{ $global_top_ad->top_ad_url }}"><img
                                    src="{{ asset('uploads/' . $global_top_ad->top_ad) }}" alt="top-ad"
                                    class="img-fluid"></a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="website-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Sports
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Football</a></li>
                                    <li><a class="dropdown-item" href="#">Cricket</a></li>
                                    <li><a class="dropdown-item" href="#">Baseball</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    National
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Dhaka</a></li>
                                    <li><a class="dropdown-item" href="#">Khulna</a></li>
                                    <li><a class="dropdown-item" href="#">Sylhet</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Lifestyle
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Insurance</a></li>
                                    <li><a class="dropdown-item" href="#">Working from Home</a></li>
                                    <li><a class="dropdown-item" href="#">Habits</a></li>
                                    <li><a class="dropdown-item" href="#">Entrepreneur</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Technology
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Computer</a></li>
                                    <li><a class="dropdown-item" href="#">Mobile</a></li>
                                    <li><a class="dropdown-item" href="#">Programming</a></li>
                                    <li><a class="dropdown-item" href="#">Freelancing</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Job List
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Government</a></li>
                                    <li><a class="dropdown-item" href="#">Non Government</a></li>
                                    <li><a class="dropdown-item" href="#">Corporate</a></li>
                                    <li><a class="dropdown-item" href="#">Accounting</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Health
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Parenting</a></li>
                                    <li><a class="dropdown-item" href="#">Diseases</a></li>
                                    <li><a class="dropdown-item" href="#">Diet</a></li>
                                    <li><a class="dropdown-item" href="#">Weight Loss</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Travel
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Adventures</a></li>
                                    <li><a class="dropdown-item" href="#">Explore</a></li>
                                    <li><a class="dropdown-item" href="#">Postcards</a></li>
                                    <li><a class="dropdown-item" href="#">Taste</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gallery
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="photo-gallery.html">Photo Gallery</a></li>
                                    <li><a class="dropdown-item" href="video-gallery.html">Video Gallery</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>


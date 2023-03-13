<section class="bg-light-subtle mt-auto">
    <div class="container">
        <footer class="pt-4">
            <div class="d-flex flex-column flex-md-row justify-content-evenly">
                <div class="mb-2">
                    <h5 class="mb-2">Categories</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>
    
                <div class="mb-2">
                    <h5 class="mb-2">Usefull Links</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Advertise</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Terms of Service</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Privacy Policy</a></li>
                        <li class="nav-item mb-2"><a href="{{ route('echo365.contact') }}" class="nav-link p-0 text-muted">Contact Us</a></li>
                    </ul>
                </div>
    
                <div class="mb-4">
                    <form action="{{ route('echo365.subscribe') }}" method="post" id="add_subscribe">
                        @csrf
                        <h5 class="mb-2">Subscribe to our newsletter</h5>
                        <p class="mb-2">Monthly digest of what's new and exciting from us.</p>
                        <div class="d-flex flex-column flex-sm-row w-100 gap-2 mb-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address" name="email" >
                            <button class="btn btn-primary" type="submit">Subscribe</button>
                        </div>
                        <span class="text-danger-emphasis error-text email_error"></span>
                    </form>
                </div>
            </div>
    
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center py-4 border-top">
                <p>© 2022 Company, Inc. All rights reserved.</p>
                <ul class="list-unstyled d-flex m-0">
                    
                    <li class="ms-3">
                        <a class="link-dark" href="#">
                            <i class="bi bi-facebook" style="font-size: 24px"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-dark" href="#">
                            <i class="bi bi-linkedin" style="font-size: 24px"></i>
                        </a>
                    </li>
                    <li class="ms-3">
                        <a class="link-dark" href="#">
                            <i class="bi bi-youtube" style="font-size: 24px"></i>
                        </a>
                    </li>
                    
                </ul>
            </div>
        </footer>
    </div>
</section>


<footer class="site-footer mt-5 pt-5 pb-4">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <h5 class="fw-bold mb-2">Queue Company</h5>
                <p class="mb-0 text-light-emphasis">We build custom software, ERP, POS, and SaaS products with enterprise-grade quality and practical delivery timelines.</p>
            </div>
            <div class="col-lg-3">
                <h6 class="text-uppercase small">Quick Links</h6>
                <ul class="list-unstyled mb-0 small">
                    <li><a href="{{ route('services') }}">Services</a></li>
                    <li><a href="{{ route('projects.index') }}">Projects</a></li>
                    <li><a href="{{ route('demo-login') }}">Demo Login</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="text-uppercase small">Contact</h6>
                <p class="small mb-1">contact@queue-company.test</p>
                <p class="small mb-1">+1 (555) 320-4400</p>
                <p class="small mb-0">250 Innovation Ave, Austin, TX</p>
            </div>
        </div>
        <hr class="border-secondary-subtle my-4">
        <p class="small text-secondary mb-0">© {{ now()->year }} Queue Company. All rights reserved.</p>
    </div>
</footer>

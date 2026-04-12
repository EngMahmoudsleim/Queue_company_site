@php($settings = \App\Models\SiteSetting::current())
<footer class="site-footer mt-5 pt-5 pb-4">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <h5 class="fw-bold mb-2">{{ $settings->t('company_name') }}</h5>
                <p class="mb-0 text-light-emphasis">{{ $settings->t('company_description') }}</p>
            </div>
            <div class="col-lg-3">
                <h6 class="text-uppercase small">{{ __('messages.labels.quick_links') }}</h6>
                <ul class="list-unstyled mb-0 small">
                    <li><a href="{{ route('services') }}">{{ __('messages.nav.services') }}</a></li>
                    <li><a href="{{ route('projects.index') }}">{{ __('messages.nav.projects') }}</a></li>
                    <li><a href="{{ route('demo-login') }}">{{ __('messages.nav.demo') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 class="text-uppercase small">{{ __('messages.labels.company_contact') }}</h6>
                <p class="small mb-1">{{ $settings->contact_email }}</p>
                <p class="small mb-1">{{ $settings->phone_number }}</p>
                <p class="small mb-0">{{ $settings->t('office_address') }}</p>
            </div>
        </div>
        <hr class="border-secondary-subtle my-4">
        <p class="small text-secondary mb-0">© {{ now()->year }} {{ $settings->t('company_name') }}. {{ $settings->t('footer_text') }}</p>
    </div>
</footer>

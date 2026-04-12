@extends('layouts.app', ['title' => 'About Us | Queue Company'])

@section('content')
<section class="py-6 bg-soft">
    <div class="container">
        <h1 class="mb-3">About Queue Company</h1>
        <p class="lead mb-0">We help organizations modernize operations through practical software engineering and business-focused product delivery.</p>
    </div>
</section>
<section class="py-6">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6"><div class="surface-card h-100"><h3>Mission</h3><p>Empower businesses with software that improves speed, visibility, and profitability.</p></div></div>
            <div class="col-lg-6"><div class="surface-card h-100"><h3>Vision</h3><p>Be the trusted digital transformation partner for companies scaling across markets.</p></div></div>
            <div class="col-lg-8"><div class="surface-card h-100"><h3>Our Story</h3><p>Queue Company started by solving operational bottlenecks for SMEs and evolved into a multi-domain software team delivering ERP, POS, SaaS, and custom applications.</p></div></div>
            <div class="col-lg-4"><div class="surface-card h-100"><h3>Strengths</h3><ul class="mb-0"><li>Business-first discovery</li><li>Maintainable architecture</li><li>Long-term post-launch support</li></ul></div></div>
        </div>
    </div>
</section>
@endsection

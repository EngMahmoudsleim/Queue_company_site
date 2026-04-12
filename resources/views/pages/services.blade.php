@extends('layouts.app', ['title' => 'Services | Queue Company'])

@section('content')
<section class="py-6 bg-soft">
  <div class="container">
    <h1 class="mb-3">Services</h1>
    <p class="lead mb-0">From strategy to delivery, we design scalable systems that fit your workflow.</p>
  </div>
</section>
<section class="py-6">
  <div class="container">
    <div class="row g-4">
      @foreach([
      ['Custom Software Development','Tailored web platforms and internal systems built around your operations.'],
      ['ERP Systems','Integrated ERP modules for finance, procurement, HR, and stock.'],
      ['POS Systems','Fast and reliable POS systems for restaurants, retail, and pharmacies.'],
      ['E-commerce Solutions','Omnichannel commerce systems with payments, delivery, and reporting.'],
      ['Maintenance & Support','SLA-backed support, enhancements, bug fixing, and monitoring.'],
      ['Cloud Systems','Scalable cloud-native architecture with deployment automation.']
      ] as [$title,$desc])
      <div class="col-md-6 col-lg-4">
        <article class="service-card h-100 mouse-lift">
          <h5>{{ $title }}</h5>
          <p class="mb-0">{{ $desc }}</p>
        </article>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection

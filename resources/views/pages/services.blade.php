@extends('layouts.app', ['title' => 'Services | Queue Company'])
@section('content')
<div class="container"><h1 class="mb-4">Our Services</h1><div class="row g-4">@foreach([
['Custom Software Development','Tailored web platforms and internal systems built around your operations.'],
['ERP Systems','Integrated ERP modules for finance, procurement, HR, and stock.'],
['POS Systems','Fast and reliable POS systems for restaurants, retail, and pharmacies.'],
['E-commerce Solutions','Omnichannel commerce systems with payments, delivery, and reporting.'],
['Maintenance & Support','SLA-backed support, enhancements, bug fixing, and monitoring.'],
['Cloud Systems','Scalable cloud-native architecture with automated deployments.']
] as [$title,$desc])<div class="col-md-6 col-lg-4"><div class="card h-100 shadow-sm"><div class="card-body"><h5 class="card-title">{{ $title }}</h5><p class="card-text">{{ $desc }}</p></div></div></div>@endforeach</div></div>
@endsection

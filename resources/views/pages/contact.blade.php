@extends('layouts.app', ['title' => 'Contact Us | Queue Company'])

@section('content')
<section class="py-6 bg-soft">
  <div class="container">
    <h1 class="mb-3">Contact Us</h1>
    <p class="lead mb-0">Tell us about your software goals and we will respond with a practical roadmap.</p>
  </div>
</section>
<section class="py-6">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-7">
        <div class="surface-card h-100">
          @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
          @if($errors->any())
            <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
          @endif
          <form method="POST" action="{{ route('contact.store') }}" class="row g-3">
            @csrf
            <div class="col-md-6"><label class="form-label">Name</label><input name="name" value="{{ old('name') }}" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Email</label><input name="email" type="email" value="{{ old('email') }}" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Phone</label><input name="phone" value="{{ old('phone') }}" class="form-control"></div>
            <div class="col-md-6"><label class="form-label">Subject</label><input name="subject" value="{{ old('subject') }}" class="form-control" required></div>
            <div class="col-12"><label class="form-label">Message</label><textarea name="message" rows="5" class="form-control" required>{{ old('message') }}</textarea></div>
            <div class="col-12"><button class="btn btn-primary rounded-pill px-4">Send Message</button></div>
          </form>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="surface-card h-100">
          <h5>Company Contact Details</h5>
          <p class="mb-2"><strong>Email:</strong> contact@queue-company.test</p>
          <p class="mb-2"><strong>Phone:</strong> +1 (555) 320-4400</p>
          <p class="mb-0"><strong>Office:</strong> 250 Innovation Ave, Austin, TX</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

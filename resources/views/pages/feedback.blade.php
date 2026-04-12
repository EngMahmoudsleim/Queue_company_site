@extends('layouts.app', ['title' => app()->getLocale() === 'ar' ? 'إرسال ملاحظة' : 'Send Feedback'])
@section('content')
<section class="py-6 bg-soft"><div class="container"><h1 class="mb-2">{{ app()->getLocale() === 'ar' ? 'ملاحظات وتقارير' : 'Feedback & Bug Reports' }}</h1><p class="lead mb-0">{{ app()->getLocale() === 'ar' ? 'ساعدنا على تحسين الخدمات.' : 'Help us improve quality and support.' }}</p></div></section>
<section class="py-6"><div class="container"><div class="row justify-content-center"><div class="col-lg-8"><div class="surface-card">@if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
<form method="POST" action="{{ route('feedback.store') }}" enctype="multipart/form-data" class="row g-3">@csrf
<div class="col-md-6"><label class="form-label">Name</label><input class="form-control" name="name" value="{{ old('name') }}" required></div><div class="col-md-6"><label class="form-label">Email</label><input type="email" class="form-control" name="email" value="{{ old('email') }}" required></div>
<div class="col-md-6"><label class="form-label">WhatsApp (optional)</label><input class="form-control" name="whatsapp" value="{{ old('whatsapp') }}"></div><div class="col-md-3"><label class="form-label">Type</label><select name="type" class="form-select">@foreach(['suggestion'=>'Suggestion','bug_report'=>'Bug Report','comment'=>'Comment','inquiry'=>'Inquiry'] as $k=>$v)<option value="{{ $k }}" @selected(old('type')===$k)>{{ $v }}</option>@endforeach</select></div><div class="col-md-3"><label class="form-label">Priority</label><select name="priority" class="form-select">@foreach(['low'=>'Low','normal'=>'Normal','high'=>'High'] as $k=>$v)<option value="{{ $k }}" @selected(old('priority','normal')===$k)>{{ $v }}</option>@endforeach</select></div>
<div class="col-12"><label class="form-label">Subject</label><input class="form-control" name="subject" value="{{ old('subject') }}" required></div>
<div class="col-12"><label class="form-label">Message</label><textarea class="form-control" name="message" rows="5" required>{{ old('message') }}</textarea></div>
<div class="col-md-8"><label class="form-label">Current page URL</label><input class="form-control" name="current_url" value="{{ old('current_url', url()->current()) }}"></div><div class="col-md-4"><label class="form-label">Screenshot</label><input type="file" class="form-control" name="screenshot"></div>
<div class="col-12"><button class="btn btn-primary rounded-pill px-4">Submit</button></div>
</form></div></div></div></div></section>
@endsection

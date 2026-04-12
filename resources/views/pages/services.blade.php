@php($services = data_get($page?->sections, 'services', []))
@extends('layouts.app', ['title' => $page?->t('meta_title') ?: $page?->t('hero_title')])
@section('content')
<section class="py-6 bg-soft"><div class="container"><h1 class="mb-3">{{ $page?->t('hero_title') }}</h1><p class="lead mb-0">{{ $page?->t('hero_subtitle') }}</p></div></section>
<section class="py-6"><div class="container"><div class="row g-4">@foreach($services as $service)<div class="col-md-6 col-lg-4"><article class="service-card h-100 mouse-lift"><h5>{{ app()->getLocale()==='ar' ? data_get($service,'title_ar') : data_get($service,'title_en') }}</h5><p class="mb-0">{{ app()->getLocale()==='ar' ? data_get($service,'description_ar') : data_get($service,'description_en') }}</p></article></div>@endforeach</div></div></section>
@endsection

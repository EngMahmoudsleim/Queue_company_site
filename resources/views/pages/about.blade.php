@extends('layouts.app', ['title' => $page?->t('meta_title') ?: $page?->t('hero_title')])
@section('content')
<section class="py-6 bg-soft"><div class="container"><h1 class="mb-3">{{ $page?->t('hero_title') }}</h1><p class="lead mb-0">{{ $page?->t('hero_subtitle') }}</p></div></section>
<section class="py-6"><div class="container"><div class="surface-card"><p class="mb-0">{{ $page?->t('body') ?: 'Queue Company started by solving operational bottlenecks for SMEs and evolved into a multi-domain software team delivering ERP, POS, SaaS, and custom applications.' }}</p></div></div></section>
@endsection

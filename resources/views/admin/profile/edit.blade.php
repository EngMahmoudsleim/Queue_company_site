@extends('admin.layouts.app', ['title' => __('messages.admin.profile')])

@section('content')
<div class="page-header d-print-none mb-3">
    <h2 class="page-title">{{ __('messages.admin.profile') }}</h2>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <form method="POST" action="{{ route('admin.profile.update') }}" class="card">
            @csrf
            @method('PUT')
            <div class="card-header"><h3 class="card-title">{{ __('messages.admin.profile_information') }}</h3></div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.admin.name') }}</label>
                    <input name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.labels.email') }}</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
                </div>
            </div>
            <div class="card-footer text-end"><button class="btn btn-primary">{{ __('messages.buttons.save') }}</button></div>
        </form>
    </div>

    <div class="col-lg-6" id="password">
        <form method="POST" action="{{ route('admin.profile.password.update') }}" class="card">
            @csrf
            @method('PUT')
            <div class="card-header"><h3 class="card-title">{{ __('messages.admin.change_password') }}</h3></div>
            <div class="card-body row g-3">
                <div class="col-12">
                    <label class="form-label">{{ __('messages.admin.current_password') }}</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.admin.new_password') }}</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="col-12">
                    <label class="form-label">{{ __('messages.admin.confirm_password') }}</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>
            </div>
            <div class="card-footer text-end"><button class="btn btn-primary">{{ __('messages.buttons.update') }}</button></div>
        </form>
    </div>
</div>
@endsection

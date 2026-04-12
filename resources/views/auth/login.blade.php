@extends('layouts.app', ['title' => 'Admin Login'])
@section('content')
<div class="container" style="max-width:520px"><div class="card shadow-sm p-4"><h1 class="h4 mb-3">Admin Login</h1><form method="POST" action="{{ route('login.store') }}">@csrf<div class="mb-3"><label>Email</label><input name="email" type="email" value="{{ old('email') }}" class="form-control"></div><div class="mb-3"><label>Password</label><input name="password" type="password" class="form-control"></div><div class="form-check mb-3"><input type="checkbox" name="remember" class="form-check-input" id="remember"><label for="remember" class="form-check-label">Remember me</label></div><button class="btn btn-primary w-100">Sign in</button></form></div></div>
@endsection

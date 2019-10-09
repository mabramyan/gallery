@extends('layouts.app')

@section('content')
<form id="login-form" method="POST" action="{{ route('login') }}">
    @csrf

    <span class="login-form-title">Sign In</span>
    <div class="form-group">
        <label for="login-username">Username</label>
        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="left-error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="login-password">Password</label>
        <input id="login-password" type="password" class="@error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">

        @error('password')
        <span class="left-error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <span class="error-message"></span>
        <input type="submit" value="Sign In" class="submit-btn">
    </div>
</form>

@endsection

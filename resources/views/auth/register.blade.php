@extends('layouts.app')

@section('content')

<form id="registration-form" method="POST" action="registration.php">
    <div class="registration-form-title">Account Creation</div>
    <hr>
    <div class="form-group">
        <label for="username-input">Username</label>
        <input id="username" type="text" class="@error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="left-error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="email-input">Email Address</label>
        <input id="email-input" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="left-error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-input">Password</label>

        <input id="password-input" type="password" placeholder="●●●●●●●●"
            class=" @error('password') is-invalid @enderror" name="password" required
            autocomplete="new-password">

        @error('password')
        <span class="left-error" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="password-repeat-input">Repeat Password</label>
        <input id="password-repeat-input" type="password" class="form-control" placeholder="●●●●●●●●"
                                    name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="form-group">
        <span class="error-message"></span>
        <input class="submit-btn" type="submit" value="Create Account">
    </div>
</form>



@endsection

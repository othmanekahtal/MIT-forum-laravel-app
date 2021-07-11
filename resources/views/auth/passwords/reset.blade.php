<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/upgrade.css') }}" rel="stylesheet">
</head>
<body>
<div class="main_content">
    <h2>{{ __('Reset Password') }}</h2>
    <form method="POST" action="{{ route('password.update') }}" class="form-box">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="group-form">
            <label for="email" class="label-form">
                Address Email :
            </label>
            <input id="email" type="email" class="input-form @error('email') is-invalid @enderror" name="email"
                   value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="email" autofocus>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="group-form">
            <label for="password" class="label-form">{{ __('Password') }}</label>

                <input id="password" type="password" class="input-form @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password" placeholder="new password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                @enderror
        </div>

        <div class="group-form">
            <label for="password-confirm"
                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                       autocomplete="new-password" placeholder="confirm new password">
        </div>

        <div class="group-form">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

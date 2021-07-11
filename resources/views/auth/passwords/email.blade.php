{{--<div class="row justify-content-center">--}}
{{--    <div class="col-md-8">--}}
{{--        <div class="card">--}}
{{--            <h2>{{ __('Reset Password') }}</h2>--}}
{{--            @if (session('status'))--}}
{{--                {{ session('status') }}--}}
{{--            @endif--}}
{{--            <form method="POST" action="{{ route('password.email') }}">--}}
{{--                @csrf--}}

{{--                <div class="form-group row">--}}
{{--                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                    <div class="col-md-6">--}}
{{--                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"--}}
{{--                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                        @error('email')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="form-group row mb-0">--}}
{{--                    <div class="col-md-6 offset-md-4">--}}
{{--                        <button type="submit" class="btn btn-primary">--}}
{{--                            {{ __('Send Password Reset Link') }}--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


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
    @if (session('status'))
        {{ session('status') }}
    @endif
    <form method="POST" action="{{ route('password.email') }}" class="form-box">
        @csrf

        <div class="group-form">
            <label for="email" class="label-form">
                Address email :
            </label>
            <input type="email" class="input-form" id="email" placeholder="Address email" name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>

        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="submit" class="btn btn-primary">
            {{ __('Send Password Reset Link') }}
        </button>
    </form>
</div>
</body>
</html>

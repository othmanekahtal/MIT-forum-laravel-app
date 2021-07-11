<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/verify.css') }}" rel="stylesheet">
</head>
<body>
<div class="main_content">

    @if (session('resent'))
        <lord-icon
            src="https://cdn.lordicon.com//lupuorrc.json"
            trigger="loop"
            colors="primary:#121331,secondary:#13b5ea"
            style="width:250px;height:250px">
        </lord-icon>
        <h2>{{__('Please check your email, and verify your account')}}</h2>

        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @else

        <lord-icon
            src="https://cdn.lordicon.com//tyounuzx.json"
            trigger="loop"
            colors="primary:#121331,secondary:#13b5ea"
            style="width:250px;height:250px">
        </lord-icon>
        <h2>{{__('Please check your email, and verify your account')}}</h2>

        <div class="message">
            <div>{{ __('Before proceeding, please check your email for a verification link.') }}</div>
            <div>{{ __('If you did not receive the email') }}</div>
        </div>
    @endif
    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit">{{ __('click here to request another') }}</button>
    </form>

</div>
<script src="https://cdn.lordicon.com//libs/frhvbuzj/lord-icon-2.0.2.js"></script>
</body>
</html>

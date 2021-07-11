@extends('layouts.app')

@section('content')
    <h2>Welcome back to mit form</h2>
    {{--<form action="#" method="post" class="form-box">--}}
    <form method="POST" action="{{ route('login') }}" class="form-box">
        @csrf
        <div class="group-form">
            <label for="email" class="label-form">
                email :
            </label>
            <input type="email" class="input-form" id="email" placeholder="Address email" name="email">
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="group-form">
            <label for="password" class="label-form">
                password :
            </label>
            <input type="password" class="input-form" id="password" placeholder="Password" name="password">
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button type="submit">Login</button>
    </form>
    <div class="links">
        <div class="link-login"><a href="{{route('password.request')}}">I forget my password</a></div>
        <div class="link-login"><a href="{{route('register')}}">I haven't an account</a></div>
    </div>
@endsection

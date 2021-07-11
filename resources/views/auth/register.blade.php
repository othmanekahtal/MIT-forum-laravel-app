@extends('layouts.app')

@section('content')
    <h2>Welcome back to mit form</h2>
    <form method="POST" action="{{ route('register') }}" class="form-box">
        @csrf
        <div class="group-form">
            <label for="username" class="label-form">
                username :
            </label>
            <input type="text" class="input-form" id="username" placeholder="Username" name="name">
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="group-form">
            <label for="email" class="label-form">
                email :
            </label>
            <input type="text" class="input-form" id="email" placeholder="Address email" name="email">
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
        <div class="group-form">
            <label for="password_r" class="label-form">
                repeat password :
            </label>
            <input type="password" class="input-form" id="password_r" placeholder="Repeat password" name="password_confirmation">
        </div>
        <button type="submit">Register</button>
    </form>
    <div class="links">
        <div class="link-login"><a href="{{route('login')}}">I have an account</a></div>
    </div>
@endsection

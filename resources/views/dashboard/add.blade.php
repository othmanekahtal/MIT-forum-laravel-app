<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>

<body>
<header class='header'>
    <nav class='navbar'>
        <img class="logo" src="{{asset('images/logo.png')}}" alt="logo">
        <form class="input_search" method="GET" action="">
            <input type="text" class="input_search__input" placeholder="Search by Tag">
            <button type="submit" class='pointer reset-btn input_search__icon'>
                <svg class="svg-icon">
                    <use href='{{asset("images/sprite.svg")}}#icon-search'/>
                </svg>
            </button>
        </form>
        <div class="hamburger_menu">
            <div class="hamburger_menu__icon pointer">
                <svg class="svg-icon linear_transition">
                    <use href="{{asset('images/sprite.svg#icon-menu')}}"/>
                </svg>
            </div>
            <ul class="hamburger_menu__menu hide_menu">
                <li class="menu">
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                @if(Auth::user()->permission)
                    <li class="menu">
                        <a href="/admin">All users</a>
                    </li>
                @endif
                <li class="menu">
                    <a href="{{route('account')}}">Account</a>
                </li>

                <li class="menu">
                    <a href="{{'/questions/'.Auth::id()}}">My Question</a>
                </li>
                <li class="menu bg--danger">
                    <a href="{{route('logout')}}">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="categories">
        <li class="li_category"><a class="reset-link" href="#">Python</a></li>
        <li class="li_category"><a class="reset-link" href="#">C</a></li>
        <li class="li_category"><a class="reset-link" href="#">C++</a></li>
        <li class="li_category"><a class="reset-link" href="#">C#</a></li>
        <li class="li_category"><a class="reset-link" href="#">JavaScript</a></li>
        <li class="li_category"><a class="reset-link" href="#">HTML</a></li>
        <li class="li_category"><a class="reset-link" href="#">PHP</a></li>
        <li class="li_category"><a class="reset-link" href="#">CSS</a></li>
        <li class="li_category"><a class="reset-link" href="#">SQL</a></li>
    </ul>
</header>
<div class="account-main">

    <form method="post" action="{{ route('addQuestion') }}" class="form-box" enctype="multipart/form-data">
        @csrf
        <div class="avatar_account center_element ">
            <img class="avatar-image no-radius" src="{{ asset("images/upload.png")}}" alt="">
            <input type="file" class="avatar-input" name="image_question">
        </div>
        @error('image_question')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="title" class="label-form">
                title :
            </label>
            <input type="text" class="input-form" id="title" placeholder="define your question..." name="title"
                   required>
        </div>
        @error('title')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="content" class="label-form">
                content :
            </label>
            <textarea class="input-form" id="content" placeholder="describe your question..." name="content" required></textarea>
        </div>
        @error('content')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="buttons">
            <button type="submit">add</button>
            <button class="bg--danger"><a class="reset-link white_color" href="{{route('dashboard')
        }}">Cancel</a></button>
        </div>
    </form>

</div>
<div class="footer" style="position: absolute;bottom: 0;width: 100%">
    <div class="copyright">
        © All Rights Reserved by mit forum
    </div>
    <div class="developer">
        developed by <a href="https://github.com/othmanekahtal/" class="reset-link pointer linear_transition">Othmane
            kahatal</a>
    </div>
</div>
<script src="{{asset("js/main.js")}}">
</script>
<script src="{{asset('js/loading_img.js')}}"></script>

</body>

</html>

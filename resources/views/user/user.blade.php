<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    <link rel="stylesheet" href="{{asset('css/profile.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/user.css')}}">
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
                    <a href="{{route('dashboard')}}">dashboard</a>
                </li>
                <li class="menu">
                    <a href="{{route('add')}}">Add Question</a>
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
</header>
<div class="container-user-question">
    <div class="user-box">
        <div class="main-info">
            <div class="username">
                {{$user->name}}
            </div>
            <div class="user-image">
                <img src="{{asset('images/'.$user->image_path_user)}}" alt="image user">
            </div>
        </div>
        <div class="email">email : {{$user->email}}</div>
        <div class="email">gender : {{$user->sex ? 'male':'female'}}</div>
        <div class="permission">permission : {{$user->permission?'Admin':'User'}}</div>
        <div class="since">created at : {{$user->created_at}}</div>
        @if($permission)
            <div class="deactivate-account"><a class="reset-link danger-text" href="/delete/{{$user->id}}">deactivate
                    account</a></div>
        @endif
    </div>
    <div class="questions-box">
        @foreach($questions as $question)
            <div class="post">
                <h2 class="title">
                    <a class="reset-link color-gray pointer" href="/question/{{$question->id}}">
                        {{$question->title}}
                    </a>
                </h2>
                <div class="images">
                    <img src="{{asset('images/'.$question->image_path_question)}}" alt="">
                </div>
                <div class="content">
                    {{$question->content}}
                </div>
                @if($permission)
                    <a href="/question_delete/{{$question->id}}" class="reset-link pointer danger-text">delete</a>
                @endif
            </div>
        @endforeach
        {{--        {{print_r($questions)}}--}}
    </div>
</div>
<div class="footer">
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

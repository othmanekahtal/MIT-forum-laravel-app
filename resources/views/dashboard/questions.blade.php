<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <title>Document</title>
</head>

<body style="grid-template-rows: auto auto 1fr auto">
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
                @if(Auth::user()->permission)
                    <li class="menu">
                        <a href="/admin">All users</a>
                    </li>
                @endif
                <li class="menu">
                    <a href="{{route('account')}}">Account</a>
                </li>
                <li class="menu">
                    <a href="{{route('add')}}">Add Question</a>
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
<h1 style="text-align: center">My questions :</h1>
<div class="main">
    @foreach($questions as $question)
        <a class="reset-link post pointer" href="{{'/question/'.$question->id}}">
            <div class="question-box">
                <h2 class="question_title">
                    {{$question->title}}
                </h2>
                <p class="question_content">
                    {{$question->content}}
                </p>
                @if($question->image_path_question)
                    <img class="question_image" src="{{asset('images/'.$question->image_path_question)}}"
                         alt="question-image">
                @endif
                <div class="question-indicator">
                    <ul class="indicator-tags">
                        <li class="list_category">
                            <svg class="svg-icon tag_icon">
                                <use href="{{asset('images/sprite.svg').'#icon-hash'}}"/>
                            </svg>
                            <span>Data science</span>
                        </li>
                    </ul>
                    <ul class="indicator-categories">
                        <li class="list_category">
                            <svg class="svg-icon category_icon">
                                <use href="{{asset('images/sprite.svg').'#icon-tag'}}"/>
                            </svg>
                            <span>Python</span>
                        </li>
                    </ul>
                </div>
            </div>

        </a>
    @endforeach

</div>
<div class="footer">
    <div class="copyright">
        ?? All Rights Reserved by mit forum
    </div>
    <div class="developer">
        developed by <a href="https://github.com/othmanekahtal/" class="reset-link pointer linear_transition">Othmane
            kahatal</a>
    </div>
</div>
<script src="{{asset("js/main.js")}}">
</script>
</body>

</html>

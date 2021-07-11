<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <a href="#">Add Question</a>
                </li>
                <li class="menu">
                    <a href="{{route('account')}}">Account</a>
                </li>
                <li class="menu">
                    <a href="#">My Answer</a>
                </li>
                <li class="menu">
                    <a href="#">My Question</a>
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
<div class="main">
    <div class="post">
        <div class="profile">
            <div class="avatar">
                <img
                    src="https://img.freepik.com/free-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg?size=626&ext=jpg"
                    alt="avatar">
            </div>
            <div class="username">MI Othmane</div>
            <div class="title_user">Data Analyst</div>
        </div>
        <div class="question-box">
            <h2 class="question_title">
                Question content here ?
            </h2>
            <p class="question_content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium amet, aspernatur dolor dolore
                doloremque dolorum ducimus est eveniet harum illo iusto magnam magni minus, officia, provident ratione
                suscipit tempora!
            </p>
            <img class="question_image" src="https://miro.medium.com/max/8192/1*s-zmitp1YOLIQWAGBc_avA@2x.jpeg"
                 alt="question-image">
            <div class="question-indicator">
                <ul class="indicator-tags">
                    <li class="list_category">
                        <svg class="svg-icon tag_icon">
                            <use href="images/sprite.svg#icon-hash"/>
                        </svg>
                        <span>Data science</span>
                    </li>
                </ul>
                <ul class="indicator-categories">
                    <li class="list_category">
                        <svg class="svg-icon category_icon">
                            <use href="images/sprite.svg#icon-tag"/>
                        </svg>
                        <span>Python</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="question-actions">
            <div class="answer pointer">
                <svg class="svg-icon action-icon">
                    <use href="images/sprite.svg#icon-answer"/>
                </svg>
                <span>Answer</span>
            </div>
            <div class="share pointer">
                <svg class="svg-icon action-icon">
                    <use href="images/sprite.svg#icon-share"/>
                </svg>
                <span>Share</span>
            </div>
        </div>
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
</body>

</html>

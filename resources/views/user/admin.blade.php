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
                    <a href="{{route('dashboard')}}">Dashboard</a>
                </li>
                <li class="menu">
                    <a href="/account">Account</a>
                </li>
                <li class="menu">
                    <a href="{{route('add')}}">Add Question</a>
                </li>
                <li class="menu">
                    <a href="{{'/questions/'.Auth::id()}}">My Question</a>
                </li>
                @if(Auth::user()->permission)
                    <li class="menu">
                        <a href="/admin">All users</a>
                    </li>
                @endif
                <li class="menu bg--danger">
                    <a href="{{route('logout')}}">Log out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="users-content">
    <h1 class="center">Users :</h1>
    <div class="users">
        <table class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>username</th>
                <th>email</th>
                <th>permission</th>
                <th>sex</th>
                <th>created_at</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if($user->id != Auth::id())
                    <tr>
                        <th>{{$user->id}}</th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->permission ? 'admin':'user'}}</th>
                        <th>{{$user->sex ? 'male':'female'}}</th>
                        <th>{{$user->created_at}}</th>
                        <th class="links-table">
                            <a href='/user/{{$user->id}}' class="reset-link color-gray pointer">Show</a>
                            <a href="/delete/{{$user->id}}" class="danger-text reset-link pointer">delete</a>
                        </th>
                    </tr>
                @endif
            @endforeach
            <!-- and so on... -->
            </tbody>
        </table>
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

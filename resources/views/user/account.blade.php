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
                    <a href="{{route('dashboard')}}">dashboard</a>
                </li>
                <li class="menu">
                    <a href="{{route('add')}}">Add Question</a>
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
</header>
<div class="account-main">
    <h2 class="center">Account information :</h2>
    <form method="post" action="{{ route('update_account') }}" class="form-box" enctype="multipart/form-data">
        @csrf
        <div class="avatar_account center_element">
            <img class="avatar-image" src="{{ asset("images/".$user->image_path_user)}}" alt="">
            <input type="file" class="avatar-input" name="avatar">
        </div>
        @error('avatar')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="username" class="label-form">
                username :
            </label>
            <input type="text" class="input-form" id="username" placeholder="Username" name="username"
                   value="{{$user->name}}">
        </div>
        @error('username')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="email" class="label-form">
                email :
            </label>
            <input type="text" class="input-form" id="email" placeholder="Address email" name="email" disabled
                   value="{{$user->email}}">
        </div>
        @error('email')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="sex" class="label-form">
                sex :
            </label>
            <select id="sex" name="sex">
                <option {{$user->sex == 1 ? 'selected':''}} value="1">male</option>
                <option {{$user->sex == 0 ? 'selected':''}} value="0">female</option>
            </select>
        </div>
        <div class="group-form">
            <label for="password" class="label-form">
                Old password :
            </label>
            <input type="password" class="input-form" id="password" placeholder="Old password " name="password">
        </div>
        @error('password')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="password_new" class="label-form">
                New password :
            </label>
            <input type="password" class="input-form" id="password_new" placeholder="New password" name="new_password">
        </div>
        @error('new_password')
        <div class="error-message" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
        <div class="group-form">
            <label for="password" class="label-form">
                repeat New password :
            </label>
            <input type="password" class="input-form" id="password" placeholder="New password confirmation"
                   name="new_password_confirmation">
        </div>
            <a class="reset-link danger-text pointer" href="{{route('delete_account')}}">I want to delete my account</a>
        <div class="buttons">
            <button type="submit">Update</button>
            <button class="bg--danger"><a class="reset-link white_color" href="{{route('dashboard')
        }}">Cancel</a></button>
        </div>
    </form>
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

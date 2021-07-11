welcome to mit forum
@if (!Auth::check())
    <button>
        <a href="{{route('login')}}">login</a>
    </button>
    <button>
        <a href="{{route('register')}}">register</a>
    </button>
@else
    <button><a href="{{route('dashboard.index')}}">You Account</a></button>
@endif


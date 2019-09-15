
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Journal.css')}}">

    <!-- Styles -->

    <title>@yield('title')</title>
    @stack('css')

    {{--Script File--}}

    {{--End Of Script File--}}


{{--NavBar--}}
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#features">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if(auth()->user()->isUser())
                <a class="navbar-brand" href="{{ route('user.index') }}">Home</a>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="features">
            <ul class="nav navbar-nav">
                @if(auth()->user()->isChef())
                    <li><a href="{{route('post.create')}}">Create Post</a></li>
                    <li><a href="{{route('chef.index')}}">Profile</a></li>
                @endif
                @if(auth()->user()->isUser())
                        <li><a href="{{route('user.userProfile',\Illuminate\Support\Facades\Auth::id())}}">Profile</a></li>
                    @endif

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
{{--                @if(auth()->user()->isChef())--}}
                    <li class="active">
                        <a href="{{route('user.notification')}}">New Notification
                            <span class="badge">
                                {{auth()->user()->unreadNotifications->count()}}
                            </span></a></li>
{{--                @endif--}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            </ul>
        </div>
    </div>
</nav>

{{--End Of Navbar--}}








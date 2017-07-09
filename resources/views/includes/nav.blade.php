@inject('test','App\Utilities\Test')
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            @if($test->isClient())
            <a class="navbar-brand" href="{{ url('/client') }}">
                {{ config('app.name', 'Starwork') }}
            </a>
            @else
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Starwork') }}
                </a>
            @endif

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (  Auth()->guest() )
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;padding-left: 50px;">
                            <img src="/storage/avatars/{{Auth::user()->avatar}}" style="width: 32px;height: 32px;position: absolute;top: 10px;left: 10px;border-radius: 50%;">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                            {{-- we must render the client to his profile and the user to his profile,so we should make
                                a test on the type of loged in user
                             --}}
                            @if($test->isClient())
                                <li><a href="{{url('/client/profile')}}">Profile</a></li>
                            @else
                            <li><a href="{{url('/profile')}}">Profile</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

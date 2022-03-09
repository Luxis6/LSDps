<div class="navbar-area navbar-style-two">
    <div class="raque-responsive-nav">
        <div class="container">
            <div class="raque-responsive-menu">
                <div class="logo">
                    <a href="{{route('home')}}">
                        <img src="/assets/img/black-logo.png" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="raque-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">{{__('nav.home')}} <span class="sr-only">(current)</span></a>
                        </li>
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item"><a href="#" class="nav-link">{{Auth()->user()->name}} <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a></li>
                                        <li class="nav-item"><a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a></li>

                                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('user.logout')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a>                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a>                                </li>
                                <li class="nav-item">
                                    <a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a>
                                </li>
                            @endauth
                        </ul>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="navbar-area navbar-style-two header-sticky">
    <div class="raque-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <ul class="navbar-nav">
                            @auth
                                <li class="nav-item"><a href="#" class="nav-link">{{Auth()->user()->name}} <i class='bx bx-chevron-down'></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a></li>
                                        <li class="nav-item"><a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{__('user.logout')}}</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="py-5 px-3 text-gray-700 dark:text-gray-500 hover:text-gray-900">Sth</a>
                                </li>
                            @endauth
                        </ul>
                    </ul>

                </div>
            </nav>
        </div>
    </div>
</div>

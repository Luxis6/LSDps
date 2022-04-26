<nav class="p-2 bg-white shadow md:flex md:items-center md:justify-between" x-data="{navbarOpen:false}">
    <!-- Primary Navigation Menu -->
    <!-- Logo -->
    <div class="flex justify-between items-center">
        <a class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900" href="{{ route('home') }}">
            <svg class="h-6 w-6 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span class="font-bold text-red-600">LSD</span>
        </a>
        <!-- <span class="text-3xl cursor-pointer mx-2 md:hidden block">
         <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
         </span>-->
        <button
            class="inline-flex items-center justify-center w-10 h-10 ml-auto border rounded-md outline-none  lg:hidden focus:outline-none"
            @click="navbarOpen = !navbarOpen">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
    <!-- Navigation Primary-->
    <div class="w-full mt-2 lg:inline-flex lg:w-auto lg:mt-0" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
        <ul class="flex flex-col w-full space-y-2 lg:w-auto lg:flex-row lg:space-y-0 lg:space-x-2">
            <li class="lg:mx-2 mx-4">
                <a href="{{route('business_home')}}" class="text-md hover:text-red-600 duration-600"
                   target="_blank">{{__('navigation.For Businesses & Applicants')}}</a>
            </li>
            @auth
                @if(\Illuminate\Support\Facades\Auth::user()->type == 2)
                    <li class="mx-4 lg:mx-0">
                        <a href="{{ route('categories') }}"
                           class="text-md hover:text-red-600 duration-600">{{__('navigation.Categories management')}}</a>
                    </li>
                    <li class="mx-4">
                        <a href="{{ route('admin.users') }}"
                           class="text-md hover:text-red-600 duration-600">{{__('navigation.Users management')}}</a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->type > 0)
                    <li class="mx-4">
                        <a href="{{route('posts.create')}}"
                           class="text-md hover:text-red-600 duration-600">{{__('navigation.Create a Post')}}</a>
                    </li>
                @else
                    <li class="mx-4">
                        <a href="{{route('posts.create')}}"
                           class="create_post text-md hover:text-red-600 duration-600">{{__('navigation.Create a Post')}}</a>
                    </li>
                @endif
            <!--Authentication-->
                <li class="mx-4">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-md font-medium hover:text-red-600 duration-600">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::user()->type > 0)
                                <x-dropdown-link :href="route('orders')">
                                    {{__('navigation.Orders')}}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('posts')">
                                    {{__('navigation.My posts')}}
                                </x-dropdown-link>
                            @endif
                        <!--Authentication-->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </li>
            @else
                <li class="mx-4 md:my-0">
                    <a href="{{ route('login') }}" class="text-md hover:text-red-600 duration-600">
                        {{__('Log in')}}
                    </a>
                </li>
                <li class="mx-4 my-6 md:my-0">
                    <a href="{{ route('register') }}" class="text-md hover:text-red-600 duration-600 ">
                        {{__('Register')}}
                    </a>
                </li>
            @endauth
        </ul>
    </div>

</nav>

<script>
    function Menu(e) {
        let list = document.querySelector('ul');
        e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]') , list.classList.add('opacity-100')) : (e.name = "menu" , list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
    }

</script>
<script>
    $('.create_post').on('click', function () {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "You aren't verified yet!",
            showCloseButton: true

        })
        return false;
    })
</script>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent shadow">
    <div class="container d-flex align-items-center justify-content-around py-2">
        <div class="logo">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('nav::main') }}">
                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                </a>
            </div>
        </div>

        <nav id="navbar" class="navbar d-flex justify-content-between w-75">
            <ul>
                <li><a class="nav-link scrollto active" href="{{ route('nav::main') }}">{{ __('menu.main') }}</a></li>
                <li class="dropdown"><a href="{{ route('nav::catalog') }}"><span>{{ __('menu.catalog') }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach(\App\Models\Maincategory::all() as $group)
                            <li class="dropdown"><a href="#"><span>{{  $group->name }}</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    @foreach(\App\Models\Category::where('category1_id', $group->id)->get() as $item)
                                        <li><a href="{{ route('nav::goods', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><a class="nav-link" href="{{ route('nav::contacts') }}">{{ __('menu.contacts') }}</a></li>
            </ul>

            <div class="hidden d-flex">
                @if (Route::has('login'))
                    @auth
                    @else
                        <a class="auth-link" href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                        @if (Route::has('register'))
                            <a class="auth-link" href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Settings Dropdown -->
            @auth()
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="dropdown">
                        <a class="sm:flex sm:items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true">
                            {{ Auth::user()->name }}
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('user::profile') }}">{{ __('menu.profile') }}</a></li>
                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                <li><a class="dropdown-item" href="{{ route('admin::panel') }}">{{ __('menu.admin') }}</a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item auth-link">{{ __('buttons.logout') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth

            <i style="color: #5c636a" class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->


{{--<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">--}}
    <!-- Primary Navigation Menu -->
{{--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">--}}
{{--        <div class="flex justify-between h-16">--}}
{{--            <div class="flex">--}}
                <!-- Logo -->
{{--                <div class="flex-shrink-0 flex items-center">--}}
{{--                    <a href="{{ route('nav::main') }}">--}}
{{--                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />--}}
{{--                    </a>--}}
{{--                </div>--}}

                <!-- Navigation Links -->
{{--                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">--}}
{{--                    <x-nav-link :href="route('nav::main')" :active="request()->routeIs('nav::main')">{{ __('menu.main') }}</x-nav-link>--}}
{{--                    <x-nav-link :href="route('nav::catalog')" :active="request()->routeIs('nav::catalog')">{{ __('menu.catalog') }}</x-nav-link>--}}
{{--                    <x-nav-link :href="route('nav::contacts')" :active="request()->routeIs('nav::contacts')">{{ __('menu.contacts') }}</x-nav-link>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--                @if (Route::has('login'))--}}
{{--                    @auth--}}
{{--                    @else--}}
{{--                        <x-nav-link :href="route('login')">{{ __('buttons.login') }}</x-nav-link>--}}
{{--                        @if (Route::has('register'))--}}
{{--                            <x-nav-link :href="route('register')">{{ __('buttons.register') }}</x-nav-link>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                @endif--}}
{{--            </div>--}}

            <!-- Settings Dropdown -->
{{--        @auth()--}}
{{--                <div class="hidden sm:flex sm:items-center sm:ml-6">--}}
{{--                    <div class="dropdown">--}}
{{--                        <a class="sm:flex sm:items-center" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="true">--}}
{{--                            {{ Auth::user()->name }}--}}
{{--                            <div class="ml-1">--}}
{{--                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </a>--}}

{{--                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}
{{--                            <li><a class="dropdown-item" href="{{ route('user::profile') }}">{{ __('menu.profile') }}</a></li>--}}
{{--                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))--}}
{{--                                <li><a class="dropdown-item" href="{{ route('admin::panel') }}">{{ __('menu.admin') }}</a></li>--}}
{{--                            @endif--}}
{{--                            <li><hr class="dropdown-divider"></li>--}}
{{--                            <li>--}}
{{--                                <form method="POST" action="{{ route('logout') }}">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit" class="dropdown-item">{{ __('buttons.logout') }}</button>--}}
{{--                                </form>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--            </div>--}}
{{--        @endauth--}}

            <!-- Hamburger -->
{{--            <div class="-mr-2 flex items-center sm:hidden">--}}
{{--                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">--}}
{{--                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">--}}
{{--                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />--}}
{{--                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Responsive Navigation Menu -->

{{--    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">--}}
{{--        <div class="pt-2 pb-3 space-y-1">--}}
{{--            <x-responsive-nav-link :href="route('nav::main')" :active="request()->routeIs('nav::main')">{{ __('menu.main') }}</x-responsive-nav-link>--}}
{{--            <x-responsive-nav-link :href="route('nav::catalog')" :active="request()->routeIs('nav::catalog')">{{ __('menu.catalog') }}</x-responsive-nav-link>--}}
{{--            <x-responsive-nav-link :href="route('nav::contacts')" :active="request()->routeIs('nav::contacts')">{{ __('menu.contacts') }}</x-responsive-nav-link>--}}
{{--        </div>--}}

{{--        <!-- Responsive Settings Options -->--}}
{{--        <div class="pt-4 pb-1 border-t border-gray-200">--}}
{{--            @if (Route::has('login'))--}}
{{--                @auth--}}
{{--                @else--}}
{{--                    <x-responsive-nav-link :href="route('login')">{{ __('buttons.login') }}</x-responsive-nav-link>--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <x-responsive-nav-link :href="route('register')">{{ __('buttons.register') }}</x-responsive-nav-link>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--            @endif--}}
{{--            @auth()--}}
{{--            <div class="flex items-center px-4">--}}
{{--                <div class="flex-shrink-0">--}}
{{--                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div class="ml-3">--}}
{{--                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>--}}
{{--                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--                <div class="mt-3 space-y-1">--}}
{{--                    <!-- Authentication -->--}}
{{--                    <x-responsive-nav-link href="{{ route('user::profile') }}">{{ __('menu.profile') }}</x-responsive-nav-link>--}}
{{--                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))--}}
{{--                        <x-responsive-nav-link href="{{ route('admin::panel') }}">{{ __('menu.admin') }}</x-responsive-nav-link>--}}
{{--                    @endif--}}
{{--                    <form method="POST" action="{{ route('logout') }}">--}}
{{--                        @csrf--}}
{{--                    <x-responsive-nav-link :href="route('logout')"--}}
{{--                            onclick="event.preventDefault();--}}
{{--                                        this.closest('form').submit();">--}}
{{--                        {{ __('buttons.logout') }}--}}
{{--                    </x-responsive-nav-link>--}}
{{--                </form>--}}
{{--                </div>--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    @endauth--}}
{{--</nav>--}}

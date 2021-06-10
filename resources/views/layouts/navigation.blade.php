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
            <ul class="w-100">
                <div class="d-flex justify-content-between">
                    <li><a class="nav-link" href="{{ route('nav::main') }}">{{ __('menu.main') }}</a></li>
                    <li class="dropdown"><a href="{{ route('nav::catalog') }}"><span>{{ __('menu.catalog') }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach(\App\Models\Maincategory::all() as $group)
                                <li class="dropdown"><a href="#"><span>{{ $group->name }}</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        @foreach(\App\Models\Category::where('category1_id', $group->id)->get() as $item)
                                            <li><a href="{{ route('nav::goods', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
{{--                    <li><a class="nav-link" href="{{ route('nav::contacts') }}">{{ __('menu.contacts') }}</a></li>--}}
                </div>

{{--                Поиск--}}
                @include('layouts.search')

{{--                Auth--}}
                <div class="authblock d-flex justify-content-between">
                    @if (Route::has('login'))
                        @auth
                        @else
                            <li><a class="auth-link" href="{{ route('login') }}">{{ __('buttons.login') }}</a></li>
                        @endauth
                    @endif

                <!-- Settings Dropdown -->
                    @auth()
                        <li class="dropdown">
                            <a class="auth-link sm:flex sm:items-center" href="#">
                                {{ Auth::user()->name }}<i class="bi bi-chevron-down"></i>
                            </a>

                            <ul>
                                <li><a href="{{ route('user::profile') }}">{{ __('menu.profile') }}</a></li>
                                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('admin'))
                                    <li><a href="{{ route('admin::panel') }}">{{ __('menu.admin') }}</a></li>
                                @endif
                                <li><hr></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item auth-link">{{ __('buttons.logout') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </div>
            </ul>

            <i style="color: #5c636a" class="bi bi-list mobile-nav-toggle"></i>

{{--Search result element--}}
            <div id="searchResult" class="hidden absolute top-14 -right-0 bg-gray-50 opacity-80">
                <ul class="flex-column align-items-start opacity-80" id="searchList">
                </ul>
            </div>

        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

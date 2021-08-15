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

        <nav id="navbar" class="navbar d-flex justify-content-between w-100">
            <ul class="w-100">
                <div class="main-menu d-flex justify-content-between">
                    <li><a class="nav-link" href="{{ route('nav::main') }}">{{ __('menu.main') }}</a></li>
                    <li class="dropdown"><a onclick="event.preventDefault()" href=""><span>{{ __('menu.catalog') }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            @foreach(\App\Models\Maincategory::all() as $group)
                                <li class="dropdown"><a href="{{ route('nav::maincategory', ['id' => $group->id]) }}"><span>{{ $group->name }}</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        @foreach(\App\Models\Category::where('category1_id', $group->id)->get()->sortBy('group_id') as $item)
                                            <li><a href="{{ route('nav::goods', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                                <hr>
                                <li><a href="{{ route('nav::collections') }}">Коллекции в интерьере</a></li>
                        </ul>
                    </li>
                </div>

{{--                Поиск--}}
                @include('layouts.search')
                {{--Search result element--}}
                <div id="searchResult" class="searchresult hidden absolute top-14 right-28 bg-gray-50 opacity-95">
                    <ul class="flex-column align-items-start bg-white" id="searchList">
                    </ul>
                </div>

{{--                Auth--}}
                <div class="authblock d-flex justify-content-between">
                    @if (Route::has('login'))
                        @auth
                        @else
                            <li>
                                <a class="auth-link" href="{{ route('login') }}" title="Авторизация">
                                    <i data-aos="zoom-in" data-aos-delay="100" class="bi bi-person-circle text-gray-500 fs-4 hover:text-gray-300"></i>
                                </a>
                            </li>
                        @endauth
                    @endif

                    <!-- Settings Dropdown -->
                    @auth()
                        <div class="userblock flex justify-content-between align-items-center">
                            <li class="dropdown">
                                <a class="auth-link sm:flex sm:items-center" href="#">
                                    {{ Auth::user()->name }}<i class="bi bi-chevron-down"></i>
                                </a>

                                <ul>
{{--                                    <li><a href="{{ route('user::profile') }}">{{ __('menu.profile') }}</a></li>--}}
                                    <li><a href="{{ route('user::downloadall') }}">Сохранить все новинки в эксель</a></li>
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
                            <a class="relative favorites-link" href="{{ route('user::myfavorites') }}" title="Избранные товары">
                                @php($favorites_count = \App\Models\Favorite::whereUserId(\Illuminate\Support\Facades\Auth::user()->id)->count())
                                @if(!$favorites_count)
                                    <i id="navFavorites" style="font-size: 1.5rem" class="bi bi-bookmarks text-gray-500"></i>
                                @else
                                    <i id="navFavorites" style="font-size: 1.6rem; color: #faa3a3" class="bi bi-bookmarks-fill"></i>
                                    <div id="favoritesCount" class="favoritesCount">
                                        {{ $favorites_count }}
                                    </div>
                                @endif
                            </a>
                            @if($favorites_count > 0)
                                <li class="dropdown">
                                    <a class="favoritesDropdown sm:flex sm:items-center" href="#">
                                        <i class="bi bi-chevron-down"></i>
                                    </a>

                                    <ul>
                                        <li><a href="{{ route('user::deleteallfavorites') }}">Очистить Избранные</a></li>
                                        <li><a href="{{ route('user::downloadfavorites') }}">Сохранить Избранные в эксель</a></li>
                                    </ul>
                                </li>
                            @endif
                        </div>
                    @endauth
                </div>
            </ul>

            <i style="color: #5c636a" class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->

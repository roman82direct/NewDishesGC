<footer id="footer" class="">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-info shadow">
                        <a class="navbar-brand flex justify-center" href="{{ url('/') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />{{ config('app.name', 'Laravel') }}
                        </a>
                        <p class="pb-3"><em>Товарное направление "Посуда и Домашний текстиль"</em></p>
                        <p>
                            119021, Россия  <br>
                            г. Москва, ул. Тимура Фрунзе 11, с.49<br><br>
                            <strong>Тел:</strong> +7 (495) 663 39 62<br>
{{--                            <strong>Email:</strong> cookware@lblmsk.ru<br>--}}
                        </p>
                        <div class="social-links mt-3">
                            <a href="https://www.facebook.com/galacentre.ru/" class="facebook" target="_blank"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/galacentre/" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
                            <a href="https://www.youtube.com/channel/UCkw-p_jp1WBwEUW8s3I7W5Q" class="linkedin" target="_blank"><i class="bi bi-youtube"></i></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Навигация</h4>
                    <ul>
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="{{ route('nav::catalog') }}">{{ __('menu.catalog') }}</a></li>--}}
                        @foreach(\App\Models\Maincategory::all() as $item)
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('nav::maincategory', ['id' => $item->id]) }}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Полезные ссылки</h4>
                    <ul>
                        <li><a href="https://www.galacentre.ru/" target="_blank" class="gc-link">@include('components.mysvg.galacentre')</a></li>
                        <li><a href="https://www.galamart.ru/" target="_blank" class="gc-link">@include('components.mysvg.galamart')</a></li>
{{--                        <li><i class="bx bx-chevron-right"></i> <a href="https://by-shop.ru/" target="_blank">by-shop.ru</a></li>--}}
                    </ul>
                </div>

{{--                <div class="col-lg-4 col-md-6 footer-newsletter">--}}
{{--                    <h4>Наши новости</h4>--}}
{{--                    <p>Подпишитесь, чтобы быть в курсе...</p>--}}
{{--                    <form action="" method="post">--}}
{{--                        <input type="email" name="email">--}}
{{--                        <input type="submit" value="Подписаться">--}}
{{--                    </form>--}}

{{--                </div>--}}

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
{{--            &copy; Copyright--}}
            <strong><span>{{ config('app.name', 'Laravel') }}</span></strong>.
{{--            All Rights Reserved--}}
        </div>
        <div class="credits">
{{--            Developed by <a href="#">PaRom</a>--}}
        </div>
    </div>
</footer><!-- End Footer -->

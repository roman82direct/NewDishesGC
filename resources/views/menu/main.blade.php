<x-app-layout>
        <!-- Featured Image Slider -->
        <div id="featured">
            <ul data-aos="zoom-in" data-aos-delay="200">
                @if($categories)
                <li data-aos="fade-in" data-aos-delay="400">
                    <div class="hero-container" data-aos="fade-up">
                        <h1>"Посуда и Домашний текстиль"</h1>
                        <h2>Новинки сезона 2021 - 2022</h2>
                        <a href="{{ route('nav::catalog') }}" class="btn-get-started">
                            <i style="color: white" class="bx bx-chevrons-down"></i>
                        </a>
                    </div>
                        <img src="{{ $categories[3]->img2 }}" alt="" />
                </li>

                @foreach($categories as $item)
                    <li data-aos="fade-in" data-aos-delay="100">
                        <a href="{{ route('nav::goods', ['id' => $item->id ]) }}">
                            <span>{{ $item->name }}</span>
                            <img src="{{ $item->img1 }}" alt="" />
                        </a>
                    </li>
                @endforeach
                @endif
            </ul>
        </div>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Добро пожаловать</h2>
            </div>

            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="content">
                        <h3>Веб-портал товарного направления "Посуда и Домашний текстиль"</h3>
                        <p>
                            Актуальные новинки Посуды и Текстиля на предстоящий сезон 2021 - 2022 года. Товары к Новому году и весенним праздникам.
                            Последние обновления регулярного ассортимента...<br>
                            {{--                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit--}}
                        </p>
                        {{--                        <a href="#" class="about-btn">About us <i class="bx bx-chevron-right"></i></a>--}}
                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="bi bi-book"></i>
                                <h4>Каталог новинок</h4>
                                <p>В нашем каталоге собраны все товары в категориях "Посуда" и "Домашний текстиль", которые поступят на склад в преддверии нового сезона 2021-2022.</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-info-circle"></i>
                                <h4>Информативность</h4>
                                <p>Качественные фото. Описание каждого товара. Прогноз цены...</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-chat-text"></i>
                                <h4>Пользовательский опыт</h4>
                                <p>Авторизовавшись в системе, Вы сможете оценивать, комментировать товары, формировать свои списки товаров, делиться списками с другими пользователями.</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-clock-history"></i>
                                <h4>Оперативность и своевременность</h4>
                                <p>Посетив портал, Вы сможете получить актуальную информацию по нашим новинкам из "первых рук"</p>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= goodsByLikes Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>ТОП лайков</h2>
            </div>

            <div class="goodsByLikes-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach($goodsByLikes as $item)
                        <div class="swiper-slide p-4">
                            <div class="portfolio-wrap cardhover card h-100" data-aos="fade-up">
                                <div style="min-height: 250px">
                                    <img src="{{ $item->img }}" onError="this.src='/storage/img/good/temp.jpg'" class="" alt="...">
                                </div>
                                <div class="card-links">
                                    <a href="{{ route('nav::showGoodItem', ['id' => $item->id]) }}" class="card-link">
                                        <svg class="card-svg" xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25">
                                            <path d="M17.417 7.847c.318.644.047 1.42-.607 1.734-.185.087-.381.13-.576.13-.487 0-.954-.267-1.182-.728a4.147 4.147 0 0 0-3.748-2.31c-.726 0-1.315-.579-1.315-1.296 0-.714.589-1.295 1.315-1.295 2.62 0 4.964 1.443 6.113 3.765zm8.04 16.325a1.647 1.647 0 0 1-1.164.474 1.65 1.65 0 0 1-1.163-.474L18.795 19.9a11.218 11.218 0 0 1-6.836 2.317C5.793 22.218.777 17.276.777 11.202S5.793.186 11.96.186 23.14 5.128 23.14 11.202c0 2.37-.77 4.562-2.068 6.361l4.383 4.318a1.602 1.602 0 0 1 0 2.29zM11.96 19.627c2.104 0 4.03-.756 5.521-2.003.46-.384.874-.819 1.243-1.288a8.288 8.288 0 0 0 1.786-5.134c0-4.645-3.836-8.424-8.55-8.424-4.715 0-8.551 3.78-8.551 8.424 0 4.645 3.836 8.424 8.55 8.425z" />
                                        </svg>
                                    </a>
                                </div>
                                <div style="min-height: 130px" class="card-body">
                                    <p class="card-text">{{ $item->art }}</p>
                                    <p style="font-size: 12px" class="card-text fst-italic">{{ $item->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
{{--                <div class="swiper-pagination"></div>--}}
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section><!-- End goodsByLikes Section -->

    <!-- ======= Cta Section ======= -->
{{--    <section id="cta" class="cta">--}}
{{--        <div class="container" data-aos="zoom-in">--}}
{{--            <div class="text-center">--}}
{{--                <h3>Call To Action</h3>--}}
{{--                --}}{{--                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
{{--                <a class="cta-btn" href="#">Call To Action</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section><!-- End Cta Section -->--}}

    <!-- Brands Section -->
    <section id="brands" class="brands section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Торговые марки</h2>
            </div>

            <div class="brands-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div style="height: 340px" class="swiper-wrapper">
                    @foreach(\App\Models\Brand::all() as $item)
                        <div class="swiper-slide">
                            <div class="brand-item">
{{--                                Modal Links--}}
                                <a class="tm-link" data-bs-toggle="modal" data-bs-target="#brandModal{{$item->id}}"
                                   href="#brandModal{{$item->id}}">@include($item->img)</a>
{{--                                <p>--}}
{{--                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                                    {{ $item->shortdiscr }}--}}
{{--                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                                </p>--}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
{{--                <div class="swiper-button-prev"></div>--}}
{{--                <div class="swiper-button-next"></div>--}}
            </div>
        </div>
        <!-- Modal Brands-->
        @foreach(\App\Models\Brand::all() as $item)
            <div class="modal fade" id="brandModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div style="justify-content: center" class="modal-header">
                            <b class="modal-title" id="exampleModalLabel">{{$item->shortdiscr}}</b>
                        </div>
                        <div id="exampleModalLabel">@include($item->img)</div>
                        <div class="modal-body">
                            <i>{{$item->description}}</i>
                        </div>
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </section><!-- End brands Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Отзывы</h2>
            </div>

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach($comments as $item)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <p style="min-height: 280px">
                                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                    {{ $item->comment }}
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                </p>
                                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" onError="this.src='/storage/img/good/temp.jpg'">
                                <h3>{{ \App\Models\User::whereId($item->user_id)->value('name') }}</h3>
                                <h4>арт.: {{ \App\Models\Good::whereId($item->good_id)->value('art') }}</h4>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->
   </x-app-layout>

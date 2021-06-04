<x-app-layout>
        <!-- Featured Image Slider -->
        <div id="featured">
            <ul data-aos="zoom-in" data-aos-delay="200">
                <li data-aos="fade-in" data-aos-delay="400">
                    <div class="hero-container" data-aos="fade-up">
                        <h1>"Посуда и Домашний текстиль"</h1>
                        <h2>Новинки сезона 2021 - 2022</h2>
                        <a href="{{ route('nav::catalog') }}" class="btn-get-started scrollto">
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
            </ul>
        </div>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Товары</h2>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up">
                        <div class="icon"><i class="bi-alarm"></i></div>
                        <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bi bi-archive"></i></div>
                        <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                        <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="bi bi-bag-check"></i></div>
                        <h4 class="title"><a href="">Magni Dolores</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bi bi-basket"></i></div>
                        <h4 class="title"><a href="">Nemo Enim</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->

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
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

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


    <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
{{--                    <h3>Call To Action</h3>--}}
{{--                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>--}}
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>

            </div>
        </section><!-- End Cta Section -->
   </x-app-layout>

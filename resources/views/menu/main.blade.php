<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{__('menu.main')}}
        </h2>
    </x-slot>

        <!-- Featured Image Slider -->
        <div id="featured">
            <ul>
                <li>
                    <div class="hero-container">
                        <h1>"Посуда и Домашний текстиль"</h1>
                        <h2>Новинки сезона 2021 - 2022</h2>
                        <a href="{{ route('nav::catalog') }}" class="btn-get-started scrollto">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-double-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.646 6.646a.5.5 0 0 1 .708 0L8 12.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                <path fill-rule="evenodd" d="M1.646 2.646a.5.5 0 0 1 .708 0L8 8.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                    <a href="{{ route('nav::goods', ['id' => 4]) }}">
                        <span>Текстиль</span>
                        <img src="storage/img/good/434-081.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 3]) }}">
                        <span>Поуда для приготовления</span>
                        <img src="storage/img/good/846-560.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 2]) }}">
                        <span>Керамика</span>
                        <img src="storage/img/good/824-443.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 4]) }}">
                        <span>Керамика</span>
                        <img src="storage/img/good/824-419.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 3]) }}">
                        <span>Посуда для приготовления</span>
                        <img src="storage/img/good/822-199.jpg" alt="" />
                    </a>
                </li>
            </ul>
        </div>

    <div class="py-12">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services p-20">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Services</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
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
    </div>

    <div class="py-12">
        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Call To Action</h3>
                    <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <a class="cta-btn" href="#">Call To Action</a>
                </div>

            </div>
        </section><!-- End Cta Section -->
    </div>

   </x-app-layout>

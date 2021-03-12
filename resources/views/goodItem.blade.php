<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('nav::catalog') }}">{{__('menu.catalog') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('nav::goods', ['id' => $item->category_id]) }}">
                            {{\App\Models\Category::find($item->category_id)->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->art }}</li>
                </ol>
            </nav>

        </h2>
    </x-slot>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="assets/img/portfolio/portfolio-1.jpg" alt="">
                            </div>

                            <div class="swiper-slide">
                                <img src="assets/img/portfolio/portfolio-2.jpg" alt="">
                            </div>

                            <div class="swiper-slide">
                                <img src="assets/img/portfolio/portfolio-3.jpg" alt="">
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Project information</h3>
                        <ul>
                            <li><strong>Category</strong>: Web design</li>
                            <li><strong>Client</strong>: ASU Company</li>
                            <li><strong>Project date</strong>: 01 March, 2020</li>
                            <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>This is an example of portfolio detail</h2>
                        <p>
                            Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Portfolio Details Section -->

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg goodCard">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div id="carouselExampleIndicators_{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active vh70">
                                    <img src="{{ $item->img }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item vh70">
                                    <img src="{{ $item->img1 }}" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item vh70">
                                    <img src="{{ $item->img2 }}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Project information</h3>
                            <ul>
                                <li><strong>Артикул</strong>: {{ $item->art }}</li>
                                <li><strong>Наименование</strong>: <a href="#">www.example.com</a></li>
                                <li><strong>Категория</strong>: Web design</li>
                                <li><strong>Коллекция</strong>: 01 March, 2020</li>
                                <li><strong>Упаковка</strong>: ________</li>
                                <li><strong>Дата прихода</strong>: 01 March, 2020</li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Описание</h2>
                            <p></p>
                        </div>
                    </div>
                        @auth()
                            @if(Auth::user()->hasRole('admin'))
                                <div class="md:inline-flex mypd">
                                    <a class="btn btn-outline-secondary mymrgleft" href="{{route('admin::good::update', ['id' => $item->id])}}">{{ __('buttons.update') }}</a>
                                    <a class="btn btn-outline-danger mymrgleft" href="{{route('admin::good::delete', ['id' => $item->id])}}">{{ __('buttons.delete') }}</a>
                                </div>
                            @endif
                        @endauth

                </div>



{{--                <div class="goodItem">--}}
{{--                    <h2 class="itemHeader">{{ $item->art }}</h2>--}}

{{--                    <p class="itemDescription">{{ $item->name }}</p>--}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

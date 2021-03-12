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

    <div class="py-8">
    <section id="portfolio-details" class="portfolio-details bg-white shadow-sm max-w-7xl mx-auto sm:rounded-lg">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ $item->img }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ $item->img1 }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ $item->img2 }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <!-- If we need scrollbar -->
                        {{--                        <div class="swiper-scrollbar"></div>--}}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Информация</h3>
                        <ul>
                            <li><strong>Артикул</strong>: {{ $item->art }}</li>
                            <li><strong>Наименование</strong>: {{ $item->name }}</li>
                            <li><strong>Категория</strong>: {{ \App\Models\Category::find($item->category_id)->name}}</li>
                            <li><strong>Дата прихода</strong>: {{ $item->arrival }}</li>
                            <li><strong>Упаковка</strong>: <a href="#">www.example.com</a></li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Описание</h2>
                        <p>{{ $item->description }}</p>
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

        </div>
    </section>
    </div>
</x-app-layout>

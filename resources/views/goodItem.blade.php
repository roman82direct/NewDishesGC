<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-50 py-2">
            <nav class="py-2" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-sm"><a href="{{ route('nav::catalog') }}">{{__('menu.catalog') }}</a></li>
                    <li class="breadcrumb-item text-sm"><a href="{{ route('nav::goods', ['id' => $item->category_id]) }}">
                            {{\App\Models\Category::find($item->category_id)->name }}</a></li>
                    <li class="breadcrumb-item active text-sm" aria-current="page">{{ $item->art }}</li>
                </ol>
            </nav>
    </div>
    <section id="portfolio-details" class="portfolio-details max-w-7xl mx-auto sm:rounded-lg py-8 mb-6" data-aos="fade-up">
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-8">
                    <div class="portfolio-details-slider swiper-container" data-aos="fade-up">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{ $item->img }}" onError="this.src='/storage/img/good/temp.jpg'" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ $item->img1 }}" onError="this.src='/storage/img/good/temp.jpg'" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ $item->img2 }}" onError="this.src='/storage/img/good/temp.jpg'" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <!-- If we need scrollbar -->
                        {{--                        <div class="swiper-scrollbar"></div>--}}

                        <div class="item-card-links flex justify-between items-center p-1">
                            <a id="toLike" data-id="{{ $item->id }}" class="item-card-link" href="#"
                               title="{{ Auth::user() ? 'Нравится' : 'Войдите, чтобы лайкнуть...' }}"
                            >@include('components.mysvg.like')
                            </a>
                            <a id="toFavorites" data-id="{{ $item->id }}" class="item-card-link" href="#"
                               title="В избранные"
                            >@include('components.mysvg.favorites')
                            </a>
                            <a id="toComment" data-id="{{ $item->id }}" class="item-card-link" href="#"
                               title="Комментировать"
                               >@include('components.mysvg.comment')
                            </a>
                            <a id="toShare" data-id="{{ $item->id }}" class="item-card-link" href="#"
                               title="Поделиться"
                               >@include('components.mysvg.share')
                            </a>
                        </div>

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
                            <li><strong>Упаковка</strong>: <p>Нет данных</p></li>
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
</x-app-layout>

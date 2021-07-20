<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-50 py-2">
            <nav class="py-2" aria-label="breadcrumb">
                <ol class="breadcrumb">
{{--                    <li class="breadcrumb-item text-sm"><a href="{{ route('nav::catalog') }}">{{__('menu.catalog') }}</a></li>--}}
                    <li class="breadcrumb-item text-sm"><a href="{{ route('nav::maincategory', ['id' => $item->maincategory_id]) }}">{{\App\Models\Maincategory::find($item->maincategory_id)->name }}</a></li>
                    <li class="breadcrumb-item text-sm"><a href="{{ route('nav::goods', ['id' => $item->category_id]) }}">
                            {{\App\Models\Category::find($item->category_id)->name }}</a></li>
                    <li class="breadcrumb-item active text-sm" aria-current="page">{{ $item->art }}</li>
                </ol>
            </nav>
    </div>
    <section id="portfolio-details" class="portfolio-details max-w-7xl mx-auto sm:rounded-lg py-2 mb-6" data-aos="fade-up">
        <div class="container">
            <div class="goodItem-card row gy-3">
                <div class="col-lg-8">
                    @if(count($imgs) > 1)
                    <div class="portfolio-details-slider swiper-container" data-aos="fade-up">
                        <div class="swiper-wrapper align-items-center">
                            @foreach($imgs as $img)
                                <div class="swiper-slide">
                                    <img src="{{ $img }}" onError="this.src='/storage/img/good/temp.jpg'" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                        <!-- If we need scrollbar -->
{{--                                                <div class="swiper-scrollbar"></div>--}}

                    </div>
                    @else
                        <img class="altImgItem" src="{{ $imgs ? $imgs[0] : '/storage/img/good/temp.jpg' }}" alt="">
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="portfolio-info">
                        <h3>Информация</h3>
                        <ul>
                            <li><strong>Артикул</strong>: {{ $item->art }}</li>
                            <li><strong>Наименование</strong>: {{ $item->name }}</li>
                            <li><strong>Категория</strong>: {{ \App\Models\Category::find($item->category_id)->name}}</li>
                            <li><strong>Коллекция</strong>: {{ \App\Models\Collection::find($item->collection_id)->name}}</li>
{{--                            <li><strong>Прогноз цены</strong>: {{ $item->price }} руб.</li>--}}
                            <li><strong>Дата прихода</strong>:
                            @if(date($item->arrival) < now())
                                <strong style="color: darkblue">В наличии</strong>
                            @else
                                {{ date('d.m.Y', strtotime($item->arrival)) }}
                            @endif
                            <li><strong>Упаковка</strong>: {{ $item->pack }}
                                @if($item->img_pack)
                                    <a href="" data-bs-toggle="modal" data-bs-target="#packImgModal">
                                        <img style="height: 100px" src="{{ $item->img_pack }}" alt="">
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <h2>Описание</h2>
                        <p>{{ $item->description }}</p>
                    </div>
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

        @if(\Illuminate\Support\Facades\Auth::user())
            <div class="item-card-links flex justify-between items-center p-1">
                <a id="toLike" data-id="{{ $item->id }}" class="item-card-link ml-4" href="#" title="Нравится"
                >@include('components.mysvg.like')
                </a>
                <a id="toFavorites" data-id="{{ $item->id }}" class="item-card-link ml-4" href="#" title="Добавить в избранные"
                >@include('components.mysvg.favorites')
                </a>
                <a data-bs-toggle="offcanvas" href="#offcanvas"
                   role="button" aria-controls="offcanvasExample" id="toCommentLink" class="item-card-link  ml-4" href="#" title="Комментировать"
                >@include('components.mysvg.comment')
                </a>
{{--                <a id="toShare" data-id="{{ $item->id }}" class="item-card-link ml-3" href="#"--}}
{{--                   title="Поделиться"--}}
{{--                >@include('components.mysvg.share')--}}
{{--                </a>--}}
            </div>
        @else
            <div class="item-card-links flex justify-between items-center p-1">
                <a id="toastLike" class="item-card-link ml-4" title="Авторизуйтесь, чтобы поставить лайк">@include('components.mysvg.like')</a>
                <a id="toastFavorites" class="item-card-link ml-4" title="Авторизуйтесь, чтобы добавить в избранные">@include('components.mysvg.favorites')</a>
                <a id="toastComment" class="item-card-link ml-4" title="Авторизуйтесь, чтобы оставить комментарий">@include('components.mysvg.comment')</a>
{{--                <a id="toastShare" class="item-card-link ml-3">@include('components.mysvg.share')</a>--}}
            </div>
        @endif()
    </section>

{{--    Alert toast for auth--}}
@include('components.authtoast')

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Отзывы</h2>
            </div>
            @php($comments = \App\Models\Comment::whereGoodId($item->id)->get())
            @if($comments->count() == 0)
                <h3>Отзывов пока нет.</h3>
            @else
                <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach($comments as $comment)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <p style="min-height: 280px">
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        {{ $comment->comment }}
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
{{--                                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" onError="this.src='/storage/img/man.png'">--}}
                                    <h3>{{ \App\Models\User::whereId($comment->user_id)->value('name') }}</h3>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            @endif

        </div>
    </section><!-- End Testimonials Section -->

    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel">{{ Auth::user() ? 'Оставьте свой комментарий в текстовом поле ниже...' : 'Авторизуйтесь, чтобы оставить комментарий...' }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @auth()
            <div>
                <form id="commentForm">
                    @csrf
                    <input id="goodId" name="goodId" type="hidden" value="{{ $item->id }}">
                    <input id="userId" name="userId" type="hidden" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                    <div class="mb-3">
                        <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                    </div>
                </form>
                <button type="button" id="toCommentBtn" data-bs-dismiss="offcanvas"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                               active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25
                               transition ease-in-out duration-150">Отправить
                </button>
            </div>
            @endauth
        </div>
    </div>
    @include('components.modals.showGoodPackImg')
</x-app-layout>

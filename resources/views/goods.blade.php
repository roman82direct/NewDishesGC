<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <nav class="p-2" aria-label="breadcrumb">
                    <ol class="breadcrumb">
{{--                        <li class="breadcrumb-item text-sm"><a href="{{ route('nav::catalog') }}">{{__('menu.catalog') }}</a></li>--}}
                        <li class="breadcrumb-item text-sm"><a href="{{ route('nav::maincategory', ['id' => \App\Models\Category::find($id)->category1_id]) }}">{{\App\Models\Maincategory::find(\App\Models\Category::find($id)->category1_id)->name }}</a></li>
                        <li class="breadcrumb-item text-sm">{{\App\Models\Category::find($id)->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Коллекции</h2>
            </div>

            <div class="row" data-aos="fade-in">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters" style="border: none">
                        @if(count($collections) > 1)
                            <li data-filter="*" class="filter-active">Показать всё</li>
                        @endif
                        @foreach($collections->sortBy('name') as $item)
                            <li data-filter=".filter-{{ $item->id }}">{{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="sm:rounded-lg p-3" data-aos="fade-up">
                <div class="row portfolio-container row-cols-1 row-cols-lg-4 row-cols-xl-5 row-cols-md-3 row-cols-sm-2 g-4">
                    @foreach($goods->sortBy('name') as $item)
                        <div class="col portfolio-item filter-{{ $item->collection_id }}">
                            <div class="portfolio-wrap cardhover card h-100" data-aos="fade-up">
                                <h5 class="card-footer itemHeader text-sm border-0">{{ $item->art }}</h5>
                                <img src="{{ $item->img }}" onError="this.src='/storage/img/good/temp.jpg'" class="" alt="...">
                                <div class=" {{ $item->url_gc ? 'card-links-double' : 'card-links' }}">
                                    <a href="{{ route('nav::showGoodItem', ['id' => $item->id]) }}" class="card-link">
                                        <svg class="card-svg" xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25">
                                            <path d="M17.417 7.847c.318.644.047 1.42-.607 1.734-.185.087-.381.13-.576.13-.487 0-.954-.267-1.182-.728a4.147 4.147 0 0 0-3.748-2.31c-.726 0-1.315-.579-1.315-1.296 0-.714.589-1.295 1.315-1.295 2.62 0 4.964 1.443 6.113 3.765zm8.04 16.325a1.647 1.647 0 0 1-1.164.474 1.65 1.65 0 0 1-1.163-.474L18.795 19.9a11.218 11.218 0 0 1-6.836 2.317C5.793 22.218.777 17.276.777 11.202S5.793.186 11.96.186 23.14 5.128 23.14 11.202c0 2.37-.77 4.562-2.068 6.361l4.383 4.318a1.602 1.602 0 0 1 0 2.29zM11.96 19.627c2.104 0 4.03-.756 5.521-2.003.46-.384.874-.819 1.243-1.288a8.288 8.288 0 0 0 1.786-5.134c0-4.645-3.836-8.424-8.55-8.424-4.715 0-8.551 3.78-8.551 8.424 0 4.645 3.836 8.424 8.55 8.425z" />
                                        </svg>
                                    </a>
                                    @if($item->url_gc)
                                        <a href="{{ $item->url_gc }}" target="_blank" title="Посмотреть на сайте Гала-Центра" class="card-link">
                                            <svg class="card-svg" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 16 16">
                                                <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z"/>
                                                <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                                <div style="height: 100px" class="card-body">
                                    <p style="font-size: 10px" class="card-text text-sm">{{ $item->name }}</p>
                                </div>
                                @auth()
                                    @if(Auth::user()->hasRole('admin'))
                                        <div  style="z-index: 10000" class="md:inline-flex justify-center mypd">
                                            <a class="btn btn-outline-secondary mymrgleft" href="{{route('admin::good::update', ['id' => $item->id])}}">{{ __('buttons.update') }}</a>
                                            <a class="btn btn-outline-danger mymrgleft" href="{{route('admin::good::delete', ['id' => $item->id])}}">{{ __('buttons.delete') }}</a>
                                        </div>
                                    @endif
                                @endauth
                                <div class="card-footer card-text border-0">
                                    @if(date($item->arrival) < now() && !$item->url_gc)
                                        <strong style="color: darkblue">Ожидается снова</strong>
                                    @elseif(date($item->arrival < now()))
                                        <strong style="color: darkblue">В наличии</strong>
                                    @else
                                        <small class="text-muted">Дата прихода: {{ date('d.m.Y', strtotime($item->arrival)) }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

</x-app-layout>

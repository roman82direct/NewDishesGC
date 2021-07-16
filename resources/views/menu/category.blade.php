<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <nav class="py-2" aria-label="breadcrumb">
                <ol class="breadcrumb">
{{--                    <li class="breadcrumb-item text-sm"><a href="{{ route('nav::catalog') }}">{{__('menu.catalog') }}</a></li>--}}
{{--                    <li class="breadcrumb-item text-sm">{{ \App\Models\Maincategory::find($id)->name }}</li>--}}
                </ol>
            </nav>
        </div>
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>{{ \App\Models\Maincategory::find($id)->name }}</h2>
        </div>

        <div class="row" data-aos="fade-in">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters" style="border: none">
                    <li data-filter="*" class="filter-active">Все категории</li>
                    @foreach($groups as $item)
                        <li data-filter=".filter-{{ $item->id }}">{{ $item->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row portfolio-container mt-4" data-aos="fade-up">
            @foreach($categories as $category_item)
                <div class="col-xl-2 col-lg-3 col-md-6 portfolio-item filter-{{ $category_item->group_id }}">
                    <div class="portfolio-wrap cardhover card h-100 mb-3">
                        <img src="{{ $category_item->img }}" onError="this.src='/storage/img/good/temp.jpg'" alt="...">
                        <div class="card-links">
                            <a href="{{ route('nav::goods', ['id' => $category_item->id]) }}" class="card-link">
                                <svg class="card-svg" xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25">
                                    <path d="M17.417 7.847c.318.644.047 1.42-.607 1.734-.185.087-.381.13-.576.13-.487 0-.954-.267-1.182-.728a4.147 4.147 0 0 0-3.748-2.31c-.726 0-1.315-.579-1.315-1.296 0-.714.589-1.295 1.315-1.295 2.62 0 4.964 1.443 6.113 3.765zm8.04 16.325a1.647 1.647 0 0 1-1.164.474 1.65 1.65 0 0 1-1.163-.474L18.795 19.9a11.218 11.218 0 0 1-6.836 2.317C5.793 22.218.777 17.276.777 11.202S5.793.186 11.96.186 23.14 5.128 23.14 11.202c0 2.37-.77 4.562-2.068 6.361l4.383 4.318a1.602 1.602 0 0 1 0 2.29zM11.96 19.627c2.104 0 4.03-.756 5.521-2.003.46-.384.874-.819 1.243-1.288a8.288 8.288 0 0 0 1.786-5.134c0-4.645-3.836-8.424-8.55-8.424-4.715 0-8.551 3.78-8.551 8.424 0 4.645 3.836 8.424 8.55 8.425z" />
                                </svg>
                            </a>
                        </div>
                        <div style="height: 80px" class="card-body">
                            <p class="card-text text-sm">{{ $category_item->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{__('menu.catalog')}}
        </h2>
    </x-slot>

    <div class="py-8">
        <div id="portfolio" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row" data-aos="fade-in">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        @foreach(\App\Models\Maincategory::all() as $group)
                            <li data-filter=".filter-{{ $group->id }}">{{ $group->name }}</li>
                        @endforeach
                        <li data-filter="*" class="filter-active">Показать все товары</li>
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up">
            @foreach(\App\Models\Maincategory::all() as $group)
                    @foreach(\App\Models\Category::where('category1_id', $group->id)->get() as $item)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $group->id }}">
                            <div class="portfolio-wrap">
                                <img src="{{ $item->img }}" class="img-fluid" alt="">
                                <p>{{ $item->name }}</p>
                                <div class="portfolio-links">
                                    <a href="assets/img/portfolio/portfolio-1.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1">{{ $item->name }}</a>
                                    <a href="{{ route('nav::goods', ['id' => $item->id]) }}" title="{{$item->name}}"><i class="bx bx-link"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Коллекции в интерьере</h2>
            </div>

            <div class="sm:rounded-lg p-3" data-aos="fade-up">
                <div class="row portfolio-container row-cols-1 row-cols-lg-3 row-cols-xl-4 row-cols-md-3 row-cols-sm-2 g-4">
                    @foreach($collections as $item)
                        <div class="col portfolio-item">
                            <div class="portfolio-wrap cardhover card h-100" data-aos="fade-up">
                                <img src="{{ $item->img }}" onError="this.src='/storage/img/good/temp.jpg'" class="" alt="...">
                                <div class="card-links">
                                    <a href="{{ route('nav::showCollectionItem', ['id' => $item->id]) }}" class="card-link">
                                        <svg class="card-svg" xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25">
                                            <path d="M17.417 7.847c.318.644.047 1.42-.607 1.734-.185.087-.381.13-.576.13-.487 0-.954-.267-1.182-.728a4.147 4.147 0 0 0-3.748-2.31c-.726 0-1.315-.579-1.315-1.296 0-.714.589-1.295 1.315-1.295 2.62 0 4.964 1.443 6.113 3.765zm8.04 16.325a1.647 1.647 0 0 1-1.164.474 1.65 1.65 0 0 1-1.163-.474L18.795 19.9a11.218 11.218 0 0 1-6.836 2.317C5.793 22.218.777 17.276.777 11.202S5.793.186 11.96.186 23.14 5.128 23.14 11.202c0 2.37-.77 4.562-2.068 6.361l4.383 4.318a1.602 1.602 0 0 1 0 2.29zM11.96 19.627c2.104 0 4.03-.756 5.521-2.003.46-.384.874-.819 1.243-1.288a8.288 8.288 0 0 0 1.786-5.134c0-4.645-3.836-8.424-8.55-8.424-4.715 0-8.551 3.78-8.551 8.424 0 4.645 3.836 8.424 8.55 8.425z" />
                                        </svg>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p style="font-size: 14px" class="card-text text-sm">{{ $item->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

</x-app-layout>

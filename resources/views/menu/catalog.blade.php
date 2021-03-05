<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('menu.catalog')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg categoryCard">
                @foreach($categories as $item)
                <div class="categoryItem">
                    <h2 class="itemHeader">{{ $item->name }}</h2>
                    <div id="carouselExampleIndicators_{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                        @php($img = (new \App\Models\Category())->getRandomImg($item->id, 3))
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            @for($i = 1; $i < count($img); $i++)
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="{{$i}}" aria-label="Slide 2"></button>
                            @endfor
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ $img[0] }}" class="d-block w-100" alt="...">
                            </div>
                            @for($i = 1; $i < count($img); $i++)
                            <div class="carousel-item">
                                <img src="{{ $img[$i] }}" class="d-block w-100" alt="...">
                            </div>
                            @endfor
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}"  data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}"  data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="card-links">
                            <a href="{{ route('nav::goods', ['id' => $item->id]) }}" class="card-link">
                                <svg class="card-svg" xmlns="http://www.w3.org/2000/svg" width="26" height="25" viewBox="0 0 26 25">
                                    <path d="M17.417 7.847c.318.644.047 1.42-.607 1.734-.185.087-.381.13-.576.13-.487 0-.954-.267-1.182-.728a4.147 4.147 0 0 0-3.748-2.31c-.726 0-1.315-.579-1.315-1.296 0-.714.589-1.295 1.315-1.295 2.62 0 4.964 1.443 6.113 3.765zm8.04 16.325a1.647 1.647 0 0 1-1.164.474 1.65 1.65 0 0 1-1.163-.474L18.795 19.9a11.218 11.218 0 0 1-6.836 2.317C5.793 22.218.777 17.276.777 11.202S5.793.186 11.96.186 23.14 5.128 23.14 11.202c0 2.37-.77 4.562-2.068 6.361l4.383 4.318a1.602 1.602 0 0 1 0 2.29zM11.96 19.627c2.104 0 4.03-.756 5.521-2.003.46-.384.874-.819 1.243-1.288a8.288 8.288 0 0 0 1.786-5.134c0-4.645-3.836-8.424-8.55-8.424-4.715 0-8.551 3.78-8.551 8.424 0 4.645 3.836 8.424 8.55 8.425z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <p class="itemDescription">{{ $item->description }}</p>
                    @auth()
                        @if(Auth::user()->hasRole('admin'))
                            <div class="md:inline-flex mypd">
                                <a class="btn btn-outline-secondary mymrgleft" href="{{route('admin::category::update', ['id' => $item->id])}}">{{ __('buttons.update') }}</a>
                                <a class="btn btn-outline-danger mymrgleft" href="{{route('admin::category::delete', ['id' => $item->id])}}">{{ __('buttons.delete') }}</a>
                            </div>
                        @endif
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

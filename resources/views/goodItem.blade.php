<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('nav::catalog') }}">{{__('menu.catalog') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('nav::goods', ['id' => $item->category_id]) }}">
                            {{\App\Models\Category::find($item->category_id)->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $item->name }}</li>
                </ol>
            </nav>

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg goodCard">
                <div class="goodItem">
                    <h2 class="itemHeader">{{ $item->name }}</h2>
                    <div id="carouselExampleIndicators_{{ $item->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators_{{ $item->id }}" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ $item->img }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ $item->img }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ $item->img }}" class="d-block w-100" alt="...">
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
                    <p class="itemDescription">{{ $item->description }}</p>
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
        </div>
    </div>
</x-app-layout>

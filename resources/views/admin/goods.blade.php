<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::panel') }}">{{__('menu.admin')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('menu.goods')}}</li>
                </ol>
            </nav>
        </h2>
    @include('layouts.adminNav')
        @if($goods->total() > 0)
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn btn-outline-primary btn-sm" aria-current="page" href="{{ route('admin::good::create') }}">Добавить товар</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-danger btn-sm ml-1" href="{{ route('admin::good::deleteAll') }}">Удалить все товары</a>
            </li>
        </ul>
        @endif
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid-4">
                    @forelse($goods as $item)
                        <div class="card" style="width: 17rem;">
                            <img style="" src="../{{ $item->img }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->art }}</h4>
                                <h5 class="card-title">{{ $item->name }}</h5>
                                <p class="card-text">{{ (\App\Models\Category::find($item->category_id)->name) }}</p>
                                <a href="{{ route('admin::good::update', ['id'=>$item->id]) }}" class="btn btn-outline-primary">{{ __('buttons.update') }}</a>
                                <a href="{{ route('admin::good::delete', ['id'=>$item->id]) }}" class="btn btn-outline-danger">{{ __('buttons.delete') }}</a>
                            </div>
                        </div>
                    @empty
                        <div>
                            <h3>В каталоге нет товаров. Выберите файл .xlsx для загрузки.</h3>
                            <form method="POST" enctype="multipart/form-data" action="{{ route('admin::upload') }}">
                                @csrf
                                <div class="flex items-center justify-start">
                                    <input type="file" name="file" id="file" accept=" application/vnd.ms-excel,  application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                    <button class="btn btn-sm btn-outline-dark" type="submit">{{ __('buttons.upload') }}</button>
                                </div>
                            </form>
                        </div>
                    @endforelse
                </div>
            {{ $goods->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>

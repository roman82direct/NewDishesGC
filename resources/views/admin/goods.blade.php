<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::panel') }}">{{__('menu.admin')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('menu.goods')}}</li>
                </ol>
            </nav>
        </h2>
    @include('layouts.adminNav')
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
                        Товаров нет!
                    @endforelse
                </div>
            {{ $goods->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</x-app-layout>

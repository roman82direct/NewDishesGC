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
                    <h2>{{ $item->name }}</h2>
                    <img src="{{ $item->img }}" alt="">
                    <p>{{ $item->description }}</p>
                    @auth()
                        @if(Auth::user()->hasRole('admin'))
                            <a style="margin-bottom: 10px" class="btn btn-primary" href="{{route('admin::category::update', ['id' => $item->id])}}">{{ __('buttons.update') }}</a>
                            <a style="margin-bottom: 10px" class="btn btn-danger" href="{{route('admin::category::delete', ['id' => $item->id])}}">{{ __('buttons.delete') }}</a>
                        @endif
                    @endauth
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

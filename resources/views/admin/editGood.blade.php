<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::panel') }}">{{__('menu.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin::goods') }}">{{__('menu.goods')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $good->name }}</li>
                </ol>
            </nav>
        </h2>
        @include('layouts.adminNav')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @dump($good)
            </div>
        </div>
    </div>
</x-app-layout>

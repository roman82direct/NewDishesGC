<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('menu.admin')}}
        </h2>
        @include('layouts.adminNav')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach($data as $item)
                <div>
                    @foreach($item as $key=>$value)
                    <div>{{ $key.': '. $value}}</div>
                    @endforeach
                </div>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

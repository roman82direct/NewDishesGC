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

                @dump($data)
{{--                    @foreach($data as $item)--}}
{{--                        <div>--}}
{{--                            <h>{{ $item->id }}</h>--}}
{{--                            <p>{{ $item->name }}</p>--}}
{{--                            <p>{{ $item->brand }}</p>--}}
{{--                            <p>{{ $item->collection }}</p>--}}
{{--                            <i>{{ $item->arrival }}</i>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}

            </div>
        </div>
    </div>
</x-app-layout>

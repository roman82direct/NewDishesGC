<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{__('menu.editor')}}
        </h2>
        @include('layouts.adminNav')
    </x-slot>


        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @dump($category)
            </div>
        </div>

</x-app-layout>

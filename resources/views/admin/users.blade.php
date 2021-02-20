<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('menu.admin')}}
        </h2>
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <a href="{{ route('admin::users') }}">{{ __('menu.users') }}</a>
            <a href="{{ route('nav::catalog') }}">{{ __('menu.goods') }}</a>
            <a class="btn btn-outline-dark" href="{{ route('admin::upload') }}">{{ __('buttons.upload') }}</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @dump($users)
            </div>
        </div>
    </div>
</x-app-layout>

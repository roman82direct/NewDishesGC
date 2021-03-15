<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 leading-tight">
            {{__('menu.contacts')}}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form class="max-w-2xl m-auto" action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="user_name" placeholder="Имя" value="">
                            @error('art')
                            {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="user_email" placeholder="Email" value="">
                            @error('name')
                            {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="message_theme" value="" placeholder="Тема сообщения">
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="message_text" id="" rows="12"></textarea>
                        @error('text')
                        {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('buttons.send') }}</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.adminNav')
            <div style="padding: 2rem" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($count > 0)
                    <p>В каталоге {{$count}} поз.</p>
                    <a class="btn btn-outline-danger" href="{{ route('admin::good::deleteAll') }}">{{ __('buttons.delete') }}</a>
                @else
                    <p>В каталоге нет товаров. Выберите файл .xlsx для загрузки</p>
                    <form method="POST" enctype="multipart/form-data" action="{{ route('admin::upload') }}">
                        @csrf
                        <div class="flex items-center justify-start">
{{--                            <label for="file">{{ __('buttons.selectFile') }}</label>--}}
                            <input type="file" name="file" id="file" accept=" application/vnd.ms-excel,  application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            <button class="btn btn-sm btn-outline-dark" type="submit">{{ __('buttons.upload') }}</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin::panel') }}">{{__('menu.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin::goods') }}">{{__('menu.goods')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $good->art }}</li>
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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form class="max-w-5xl m-auto" action="{{route('admin::good::save')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$good->id ?? ''}}">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label class="form-label" for="art">Артикул</label>
                            <input type="text" class="form-control" name="art" value="{{$good->art ?? old('art')}}">
                            @error('art')
                            {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                            @enderror
                        </div>
                        <div class="col-md-10 mb-3">
                            <label class="form-label" for="name">Наименование</label>
                            <input type="text" class="form-control" name="name" value="{{$good->name ?? old('name')}}">
                            @error('name')
                            {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="category">Выберите категорию товаров</label>
                            <select class="form-select" name="category" aria-label="category">
                                <option selected>{{\App\Models\Category::find($good->category_id)->name ?? 'Нажмите для выбора'}}</option>
                                @foreach($categories as $category)
                                    <option> {{$category->name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="brand">Бренд</label>
                            <input type="text" class="form-control" name="brand" value="{{$good->brand ?? ''}}" placeholder="">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label" for="collection">Коллекция</label>
                            <input type="text" class="form-control" name="collection" value="{{$good->collection ?? ''}}" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="text">Описание</label>
                        <textarea class="form-control" name="text" id="" rows="5">{{$good->description ?? ''}}</textarea>
                        @error('text')
{{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="arrival">Дата прихода</label>
                        <input type="date" class="form-control" name="arrival" value="{{$good->arrival ?? ''}}" placeholder="">
                        @error('arrival')
                        {{--                        <div class="alert alert-danger">{{ $message }}</div>--}}
                        @enderror
                    </div>
                    <div class="row flex justify-around mb-3 w-full">
                        <div class="col-md-4 flex items-center">
                            <label class="form-label" for="file">
                                <img class="mr-1" style="width: 80px" src="../../../{{$good->img}}" alt="">
                            </label>
                            <input type="file" name="file" class="ml-1" id="file" accept="image/jpeg, image/png">
                        </div>
                        <div class="col-md-4 flex items-center">
                            <label class="form-label" for="file1">
                                <img class="mr-1" style="width: 80px" src="../../../{{$good->img1}}" alt="">
                            </label>
                            <input type="file" name="file1" class="ml-1" id="file1" accept="image/jpeg, image/png">
                        </div>
                        <div class="col-md-4 flex items-center">
                            <label class="form-label" for="file2">
                                <img class="mr-1" style="width: 80px" src="../../../{{$good->img2}}" alt="">
                            </label>
                            <input type="file" name="file2" class="ml-1" id="file2" accept="image/jpeg, image/png">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('buttons.save') }}</button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>

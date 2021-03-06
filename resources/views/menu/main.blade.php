<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('menu.main')}}
        </h2>
    </x-slot>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    You're logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--   </div>--}}

        <!-- Featured Image Slider -->
        <div id="featured">
            <ul>
                <li>
                    <h1>Добро пожаловать на сайт товарного направления "Посуда и Текстиль"</h1>
                    <h2>Мы рады рассказать Вам о наших новинках на сезон 2021 - 2022</h2>
                    <a href="{{ route('nav::goods', ['id' => 4]) }}">
                        <span>Керамика</span>
                        <img src="storage/img/good/824-443.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 3]) }}">
                        <span>Поуда для приготовления</span>
                        <img src="storage/img/good/846-560.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 2]) }}">
                        <span>Текстиль</span>
                        <img src="storage/img/good/434-081.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 4]) }}">
                        <span>Керамика</span>
                        <img src="storage/img/good/824-419.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('nav::goods', ['id' => 3]) }}">
                        <span>Посуда для приготовления</span>
                        <img src="storage/img/good/822-199.jpg" alt="" />
                    </a>
                </li>
            </ul>
        </div>

    <div class="py-12">
    </div>

   </x-app-layout>

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
                    <a href="#">
                        <span>Read about this project</span>
                        <img src="storage/img/good/824-443.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Read about this project</span>
                        <img src="storage/img/good/846-560.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Read about this project</span>
                        <img src="images/600x300.gif" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Read about this project</span>
                        <img src="storage/img/good/824-443.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span>Read about this project</span>
                        <img src="storage/img/good/822-199.jpg" alt="" />
                    </a>
                </li>
            </ul>
        </div>

   </x-app-layout>

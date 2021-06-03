<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.adminNav')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @dump($users)
            </div>
        </div>
</x-app-layout>

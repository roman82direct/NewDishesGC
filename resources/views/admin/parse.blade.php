<x-app-layout>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('layouts.adminNav')
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

</x-app-layout>

<div class="searchblock flex justify-content-center align-items-center">
    <input type="search"
           class="h-7 border-none border-bottom bg-transparent text-indigo-600 text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-50 focus:ring-opacity-50"
           placeholder="Поиск..."/>
    <li class="dropdown"><a href="#"><i class="bi bi-search"></i></a>
        <ul>
            @foreach(\App\Models\Category::where('category1_id', $group->id)->get() as $item)
                <li><a href="{{ route('nav::goods', ['id' => $item->id]) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </li>
</div>

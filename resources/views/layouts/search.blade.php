<div class="searchblock flex justify-content-center align-items-center">
    <form class="flex justify-content-center align-items-center" action="{{ route('user::search') }}" method="GET">
        @csrf
        <div class="input-group">
            <input type="search" id="search" name="search"
                   class="h-7 border-none border-bottom bg-transparent text-indigo-600 text-sm focus:border-indigo-300 focus:ring focus:ring-indigo-50 focus:ring-opacity-0"
                   placeholder="Поиск..."/>
            <i class="bi bi-search text-gray-400"></i>
        </div>
    </form>
</div>

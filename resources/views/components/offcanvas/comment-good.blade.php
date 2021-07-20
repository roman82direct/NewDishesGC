<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasLabel">{{ Auth::user() ? 'Оставьте свой комментарий в текстовом поле ниже...' : 'Авторизуйтесь, чтобы оставить комментарий...' }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        @auth()
            <div>
                <form id="commentForm">
                    @csrf
                    <input id="goodId" name="goodId" type="hidden" value="{{ $item->id }}">
                    <input id="userId" name="userId" type="hidden" value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                    <div class="mb-3">
                        <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                    </div>
                </form>
                <button type="button" id="toCommentBtn" data-bs-dismiss="offcanvas"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                               active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25
                               transition ease-in-out duration-150">Отправить
                </button>
            </div>
        @endauth
    </div>
</div>

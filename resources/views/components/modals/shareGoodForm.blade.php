<!--good pack img Modal -->
<div class="modal fade" id="shareMailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $item->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="shareMailForm">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Введите Email получателя</label>
                        <input type="email" class="form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="goodId" name="goodId" value="{{ $item->id }}">
                    </div>
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700
                               active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25
                               transition ease-in-out duration-150" data-bs-dismiss="modal">Отмена</button>
                    <button id="toShareBtn"  type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent
                               rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                               active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25
                               transition ease-in-out duration-150">Отправить</button>
                </form>
            </div>
        </div>
    </div>
</div>

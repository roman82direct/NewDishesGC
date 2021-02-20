
<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <a href="{{ route('admin::users') }}">{{ __('menu.users') }}</a>
    <a href="{{ route('admin::goods') }}">{{ __('menu.goods') }}</a>

    <form method="POST" enctype="multipart/form-data" action="{{ route('admin::upload') }}">
    @csrf
        <div class="flex items-center justify-end">
            <label for="file">{{ __('buttons.selectFile') }}</label>
            <input type="file" name="file" id="file" accept=" application/vnd.ms-excel,  application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
            <button class="btn btn-sm btn-outline-dark" type="submit">{{ __('buttons.upload') }}</button>
        </div>
    </form>

</div>

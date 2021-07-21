@component('vendor.mail.html.message')
Добрый день.<br>
Пользователь портала CookWareGC <strong>{{$sender_name}}</strong> отправил Вам сообщение о новинке:

<div class="col-lg-4">
    <div class="portfolio-info">
        <ul>
            <li><strong>Артикул</strong>: {{ $good->art }}</li>
            <li><strong>Наименование</strong>: {{ $good->name }}</li>
            <li><strong>Категория</strong>: {{ \App\Models\Category::find($good->category_id)->name}}</li>
            <li><strong>Коллекция</strong>: {{ \App\Models\Collection::find($good->collection_id)->name}}</li>
            <li><strong>Дата прихода</strong>:
            @if(date($good->arrival) < now())
            <strong style="color: darkblue">В наличии</strong>
            @else
            {{ date('d.m.Y', strtotime($good->arrival)) }}
            @endif
        </ul>
        <img src="{{ $good->img }}" onError="this.src='/storage/img/good/temp.jpg'" alt="">
    </div>
</div>

@component('vendor.mail.html.button', ['url' => env('APP_URL').'good'.$good->id])
Перейти к товару
@endcomponent
<hr>

<i>Данное сообщение сформировано автоматически. Отвечать на него не следует.</i>

Связаться с отправителем Вы можете по Email: {{$sender_email}}
<hr>

С уважением, команда
{{ config('app.name') }}
@endcomponent()

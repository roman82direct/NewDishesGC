@if(count($searchgoods) > 0)
    @foreach($searchgoods as $item)
        <li><a href="{{ route('nav::showGoodItem', ['id'=>$item->id]) }}">{{ $item->art }}  {{ mb_strimwidth($item->name, 0, 50, '...') }}</a></li>
    @endforeach
@else
    <li><i>Ничего не найдено...</i></li>
@endif

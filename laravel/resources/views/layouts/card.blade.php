<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-warning">Новинка!</span>
            @endIf
            @if($product->isRecommend())
                <span class="badge badge-success">Рекомендуем!</span>
            @endIf
            @if($product->isHit())
                <span class="badge badge-danger">Хит</span>
            @endIf
        </div>
        <img src="{{Storage::url($product->image)}}" alt="{{$product->name}}">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} ₽</p>
            <p>{{$product->category->name}}</p>
            <form action="{{route('basketAdd', $product->id)}}" method="POST">
                @if($product->isAvailable()) <button type="submit" class="btn btn-primary" role="button">В
                корзину</button>
                @else Пока товара нет
                @endif
                <a
                    href="{{ route('product', [$product->category->code, $product->code]) }}"
                    class="btn btn-default" role="button"
                >Подробнее</a>
                <input type="hidden" name="_token" value="lVvQi5FWlVohkq17x2Z0re4RqiKIv0x6RxWN55lR">
                @csrf
            </form>
            <p></p>
        </div>
    </div>
</div>

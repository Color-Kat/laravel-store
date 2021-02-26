<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">

        </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x_silver.jpg" alt="iPhone X 256GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} ₽</p>
            <p>{{$product->category->name}}</p>
            <form action="{{route('basketAdd', $product->id)}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                {{--                <a href="http://internet-shop.tmweb.ru/mobiles/iphone_x_256"--}}
                {{--                               class="btn btn-default" role="button">Подробнее</a>--}}
                <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                   class="btn btn-default" role="button">Подробнее</a>
                <input type="hidden" name="_token" value="lVvQi5FWlVohkq17x2Z0re4RqiKIv0x6RxWN55lR">
                @csrf
            </form>
            <p></p>
        </div>
    </div>
</div>

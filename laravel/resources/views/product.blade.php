@extends('layouts.master')

@section('title', $product->code)

@section('content')
    <div class="starter-template">
      <h1>{{$product->name}}</h1>
      <p>Цена: <b>{{$product->price}} руб.</b></p>
      <img src="{{Storage::url($product->image)}}">
      <p>{{$product->description}}</p>
            <form action="{{route('basketAdd', $product->id)}}" method="POST">
                @if($product->isAvailable()) <button type="submit" class="btn btn-primary" role="button">В
                    корзину</button>
                @else Пока товара нет
                @endif
                <input type="hidden" name="_token" value="lVvQi5FWlVohkq17x2Z0re4RqiKIv0x6RxWN55lR">
                @csrf
            </form>
{{--            <a class="btn btn-success" href="{{route('basketAdd', $product->id)}}">Добавить в корзину</a>--}}


    </div>
@endsection

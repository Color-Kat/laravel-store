@extends('layouts.master')

@section('title', 'Корзина')

@section('content')

    <div class="starter-template">
        <h1>Корзина</h1>
        <p>Оформление заказа</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                </tr>
                </thead>
                <tbody>
                @if(!is_null($order))
                @foreach($order->products()->with('category')->get(

) as $product)
                    <tr>
                        <td>
                            <a href="{{route('product', [$product->category->code, $product->code]) }}">
                                <img height="56px" src="{{Storage::url($product->image)}}">
                                {{$product->name}}
                            </a>
                        </td>
                        <td><span class="badge">{{$product->pivot->count}}</span>
                            <div class="btn-group form-inline">
                                <form action="{{route('basketSub', $product->id)}}" method="POST">
                                    <button type="submit" class="btn btn-danger" href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true">-</span></button>
                                    <input type="hidden" name="_token" value="FVMCHdSm5HVvz22b431f5BcIjP8hi77x5A6eg4Kv">
                                    @csrf
                                </form>
                                <form action="{{route('basketAdd', $product->id)}}" method="POST">
                                    <button type="submit" class="btn btn-success"><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true">+</span></button>
                                    <input type="hidden" name="_token" value="FVMCHdSm5HVvz22b431f5BcIjP8hi77x5A6eg4Kv">
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{$product->price}} ₽</td>
                        <td>{{$product->getFullPrice()}} ₽</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{$order->calculate()}} ₽</td>
                </tr>
                    @endif
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{route('order')}}">Оформить заказ</a>
            </div>
        </div>
    </div>

@endsection

@extends('auth.layouts.masterProfile')

@section('title', 'Просмотр категории')

@section('content')
    <div class="col-md-12">
        <h1>{{$product->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{$product->id}}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{$product->code}}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{$product->name}}</td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>
                    {{$product->category_id}}
                </td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{$product->description}}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img
                        src="{{Storage::url($product->image)}}"
                        height="240px"
                    ></td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{$product->price}}</td>
            </tr>
            <tr>
                <td>Лейблы</td>
                <td><div class="labels">
                        @if($product->isNew())
                            <span class="badge badge-warning">Новинка!</span>
                        @endIf
                        @if($product->isRecommend())
                            <span class="badge badge-success">Рекомендуем!</span>
                        @endIf
                        @if($product->isHit())
                            <span class="badge badge-danger">Хит</span>
                        @endIf
                    </div></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

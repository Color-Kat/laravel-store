@extends('layouts.master')

@section('title', 'Категории')

@section('content')
    <div class="starter-template">

        @foreach($categories as $category)
            <div class="panel">
                <a href="{{route('category', $category->code)}}">
                    <img src="http://internet-shop.tmweb.ru/storage/categories/mobile.jpg">
                    <h2>{{$category->name}}</h2>
                </a>
                <p>
                    {{ $category->description}}
                </p>
            </div>
        @endforeach

{{--        <div class="panel">--}}
{{--            <a href="/mobiles">--}}
{{--                <img src="http://internet-shop.tmweb.ru/storage/categories/mobile.jpg">--}}
{{--                <h2>Мобильные телефоны</h2>--}}
{{--            </a>--}}
{{--            <p>--}}
{{--                В этом разделе вы найдёте самые популярные мобильные телефонамы по отличным ценам!--}}
{{--            </p>--}}
{{--        </div>--}}

        </div>
    </div>
@endsection

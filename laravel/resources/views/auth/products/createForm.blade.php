@extends('auth.layouts.masterProfile')

@isset($product)
    @section('title', 'Редактировать товар')
@else
    @section('title', 'Cоздать товар')
@endisset

@section('content')
    <div class="col-md-12">
        <form
            method="POST"
            enctype="multipart/form-data"


            @isset($product)
            action="{{route('products.update', $product)}}"
            @else
            action="{{route('products.store')}}"
            @endisset
        >
            @isset($product)
                <h2>Радактировать товар {{$product->name}}</h2>
            @else
                <h2>Создать товар</h2>
            @endisset
            <br>
            @csrf

            @isset($product)
                @method('PUT')
            @endisset

            <div>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>

                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'code'])
                        <input
                            type="text"
                            class="form-control"
                            name="code"
                            id="code"

                            @isset($product)
                            value="{{$product->code}}"
                            @endisset
                        >
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>

                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'name'])
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            @isset($product)
                            value="{{$product->name}}"
                            @endisset
                        >
                    </div>
                </div>

                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Категория: </label>

                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}"
                                    @isset($product)
                                    @if($product->category_id === $category->id)
                                    selected
                                    @endIf
                                    @endisset
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>

                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'decription'])
							<textarea
                                class="form-control"
                                name="description"
                                id="description"
                                cols="72"
                                rows="7"
                            >@isset($product){{$product->description}}@endisset</textarea>
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить
                            <input
                                type="file"
                                style="display: none;"
                                name="image"
                                id="image"
                            >
                        </label>
                    </div>
                </div>

                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Цена: </label>

                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'price'])
                        <input
                            type="text"
                            class="form-control"
                            name="price"
                            id="price"
                            @isset($product)
                            value="{{$product->price}}"
                            @endisset
                        >
                    </div>
                </div>

                <br>

                <div class="input-group row">
                    <label for="count" class="col-sm-2 col-form-label">Кол-во: </label>

                    <div class="col-sm-6">
                        @include('auth.layouts.error', ['fieldName' => 'count'])
                        <input
                            type="number"
                            class="form-control"
                            name="count"
                            id="count"
                            @isset($product)
                            value="{{$product->count}}"
                            @endisset
                        >
                    </div>
                </div>

                <br>

                @foreach([
                    'hit' => 'Хит',
                    'new' => 'Новинка',
                    'recommend' => 'Рекомендованное'
                ] as $field => $titel)
                    <div class="input-group row">
                        <label for="$field" class="col-sm-2 col-form-label">{{$titel}}: </label>
                        <div class="col-sm-2">
                            <input
                                type="checkbox"
                                class="form-control"
                                name="{{$field}}"
                                id="{{$field}}"

                                @isset($product)
                                    @if($product->$field === 1)
                                        checked
                                    @endif
                                @endisset
                            >
                        </div>
                    </div>
                    <br>
                @endforeach

                @isset($product)
                    <button class="btn btn-success">Обновить</button>
                @else
                    <button class="btn btn-success">Создать</button>
                @endisset

            </div>
        </form>
    </div>
@endsection

@extends('auth.layouts.masterProfile')

@isset($category)
    @section('title', 'Редактировать категорию')
@else
    @section('title', 'Cоздать категорию')
@endisset

@section('content')
    <div class="col-md-12">
        <form
            method="POST"
            enctype="multipart/form-data"


            @isset($category)
            action="{{route('categories.update', $category)}}"
            @else
            action="{{route('categories.store')}}"
            @endisset
        >
            @isset($category)
                <h2>Радактировать категорию {{$category->name}}</h2>
            @else
                <h2>Создать категорию</h2>
            @endisset
            <br>
            @csrf

                @isset($category)
                    @method('PUT')
                @endisset

            <div>
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input
                            type="text"
                            class="form-control"
                            name="code"
                            id="code"

                            @isset($category)
                            value="{{$category->code}}"
                            @endisset
                        >
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id="name"
                            @isset($category)
                            value="{{$category->name}}"
                            @endisset
                        >
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                    <div class="col-sm-6">
							<textarea
                                name="description"
                                id="description"
                                cols="72"
                                rows="7"
                            >@isset($category){{$category->description}}@endisset</textarea>
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
                @isset($category)
                    <button class="btn btn-success">Обновить</button>
                @else
                    <button class="btn btn-success">Создать</button>
                @endisset

            </div>
        </form>
    </div>
@endsection

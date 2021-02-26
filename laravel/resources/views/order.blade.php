@extends('layouts.master')

@section('title', 'Оформление заказа')

@section('content')

<div class="starter-template">
    <h1>Подтвердите заказ:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Общая стоимость: <b>{{$price}} ₽.</b></p>
            <form action="{{route('order-confirm')}}" method="POST">

                <div>
                    <p>Укажите свои имя и номер телефона, чтобы наш менеджер мог с вами связаться:</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Фамилия: </label>
                            <div class="col-lg-4">
                                <input type="text" name="surname" id="surname" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
{{--                        <div class="form-group">--}}
{{--                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Email: </label>--}}
{{--                            <div class="col-lg-4">--}}
{{--                                <input type="text" name="email" id="email" value="" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <br>
                    <input type="hidden" name="_token" value="FVMCHdSm5HVvz22b431f5BcIjP8hi77x5A6eg4Kv">                    <input type="submit" class="btn btn-success" value="Подтвердите заказ">
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>

@endsection

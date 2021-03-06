@extends('auth.layouts.masterProfile')

@section('title', 'Регистрация')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Регистрация</font></font></div>
                        <form method="POST" action="{{route('register')}}" aria-label="регистр">

                            <div class="form-group row"><label for="name" class="col-md-4 col-form-label text-md-right"><font
                                        style="vertical-align: inherit;"><font
                                            style="vertical-align: inherit;">Имя</font></font></label>
                                <div class="col-md-6"><input id="name" type="text" name="name" value=""
                                                             required="required" autofocus="autofocus"
                                                             class="form-control"></div>
                            </div>
                            <div class="form-group row"><label for="email"
                                                               class="col-md-4 col-form-label text-md-right"><font
                                        style="vertical-align: inherit;"><font style="vertical-align: inherit;">Электронное
                                            письмо</font></font></label>
                                <div class="col-md-6"><input id="email" type="email" name="email" value=""
                                                             required="required" class="form-control"></div>
                            </div>
                            <div class="form-group row"><label for="password"
                                                               class="col-md-4 col-form-label text-md-right"><font
                                        style="vertical-align: inherit;"><font
                                            style="vertical-align: inherit;">Пароль</font></font></label>
                                <div class="col-md-6"><input id="password" type="password" name="password"
                                                             required="required" class="form-control"></div>
                            </div>
                            <div class="form-group row"><label for="password-confirm"
                                                               class="col-md-4 col-form-label text-md-right"><font
                                        style="vertical-align: inherit;"><font style="vertical-align: inherit;">Подтвердите
                                            пароль</font></font></label>
                                <div class="col-md-6"><input id="password-confirm" type="password"
                                                             name="password_confirmation" required="required"
                                                             class="form-control"></div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary"><font
                                            style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                Зарегистрироваться
                                            </font></font></button>
                                </div>
                            </div>
                            @csrf
                        </form>
                        <div class="card-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование пользователя</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @if($user->photo)
                                <div class="text-center">
                                    <img class="img-fluid rounded mb-2" width="300" height="300" src="{{url('uploads/'.$user->photo)}}" alt="{{$user->photo}}">
                                </div>
                            @endif
                        <form method="post" action="{{action('UserController@update', $id)}}" enctype="multipart/form-data">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">Логин:</label>
                                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Например: maksim">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Почта:</label>
                                    <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="Например: maks@mail.ru">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="firstname">Имя:</label>
                                    <input type="text" class="form-control" name="firstname" value="{{$user->firstname}}" placeholder="Например: Максим">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="secondname">Фамилия:</label>
                                    <input type="text" class="form-control" name="secondname" value="{{$user->secondname}}" placeholder="Например: Афонькин">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="patronymic">Отчество:</label>
                                    <input type="text" class="form-control" name="patronymic" value="{{$user->patronymic}}" placeholder="Например: Артёмович">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthdate">Дата рождения:</label>
                                    <input type="date" class="form-control" name="birthdate" value="{{$user->birthdate}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Телефон:</label>
                                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}" placeholder="Например: 89111111111">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender">Пол:</label>
                                    <select class="form-control" name="gender">
                                        <option disabled>Выберите пол</option>
                                        <option value="М" @if($user->gender == "М") selected @endif>М</option>
                                        <option value="Ж" @if($user->role == "Ж") selected @endif>Ж</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="passport">Паспорт:</label>
                                    <input placeholder="Например: 11 11 111111" type="text" class="form-control" name="passport" value="{{$user->passport}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address">Адрес:</label>
                                    <input type="text" class="form-control" name="address" value="{{$user->address}}" placeholder="Например: Жукова 5, 35">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="photo">Фото:</label>
                                    <input type="file" class="form-control" name="photo" placeholder="">
                                </div>
                                @auth
                                    @if(Auth::user()->role == 2)
                                        <div class="form-group col-md-4">
                                            <label for="role">Роль:</label>
                                            <select class="form-control" name="role">
                                                <option disabled>Выберите роль</option>
                                                <option value="0" @if($user->role == 0) selected @endif>Клиент</option>
                                                <option value="1" @if($user->role == 1) selected @endif>Сотрудник</option>
                                            </select>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            <div class="row">
                                @if ($errors->all())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="form-group col-md-4" style="margin-top:10px">
                                    <a href="/users" class="btn btn-dark m-1 d-inline-block">Назад</a>
                                    <button type="submit" class="btn btn-dark m-1 d-inline-block">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
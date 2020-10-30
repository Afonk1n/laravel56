@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">Данные о пользователях</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>№</td>
                                <td>Логин</td>
                                <td>Почта</td>
                                <td>Имя</td>
                                <td>Фамилия</td>
                                <td>Отчество</td>
                                <td>Дата рождения</td>
                                <td>Телефон</td>
                                <td>Пол</td>
                                <td>Паспортные данные</td>
                                <td>Адрес</td>
                                <td>Роль</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(auth()->user()->role == 2)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user['id']}}</td>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>{{$user['firstname']}}</td>
                                        <td>{{$user['secondname']}}</td>
                                        <td>{{$user['patronymic']}}</td>
                                        <td>{{$user['birthdate']}}</td>
                                        <td>{{$user['phone']}}</td>
                                        <td>{{$user['gender']}}</td>
                                        <td>{{$user['passport']}}</td>
                                        <td>{{$user['address']}}</td>
                                        <td>@if($user['role'] == 0) Клиент @else @if($user['role'] == 1) Сотрудник @else Администратор @endif @endif</td>
                                        <td align="right"><a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-dark">Редактировать</a></td>
                                        <td align="left">
                                            <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-dark" type="submit">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else @if(auth()->user()->role == 1)
                                @foreach($users as $user)
                                    @if($user['role'] == 0)
                                        <tr>
                                            <td>{{$user['id']}}</td>
                                            <td>{{$user['name']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['firstname']}}</td>
                                            <td>{{$user['secondname']}}</td>
                                            <td>{{$user['patronymic']}}</td>
                                            <td>{{$user['birthdate']}}</td>
                                            <td>{{$user['phone']}}</td>
                                            <td>{{$user['gender']}}</td>
                                            <td>{{$user['passport']}}</td>
                                            <td>{{$user['address']}}</td>
                                            <td>@if($user['role'] == 0) Клиент @else @if($user['role'] == 1) Сотрудник @else Администратор @endif @endif</td>
                                            <td align="right"><a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-dark">Редактировать</a></td>
                                            <td align="left">
                                                <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-dark" type="submit">Удалить</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                @endif
                            @endif
                            </tbody>
                        </table>
                        <a href="/admin" class="btn btn-dark">Назад</a>
                        <a href="/users/create" class="btn btn-dark">Добавить запись</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
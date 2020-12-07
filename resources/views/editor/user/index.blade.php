@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card m-1">
                    <div class="card-header">Данные о пользователях</div>
                    <div class="card-body">
                        <a href="@if (auth()->user()->role > 1) /admin @else /editor @endif" class="btn btn-dark">Назад</a>
                    </div>
                </div>
                            @if(auth()->user()->role == 2)
                                @foreach($users as $user)
                                    @if($user['role'] < 2)
                                        <div class="card m-1">
                                            <div class="card-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                        <table class="table table-striped table-bordered">
                                            @if($user->photo)
                                                <div class="text-center">
                                                    <img class="img-fluid rounded mb-2" width="300" height="300" src="{{url('uploads/'.$user->photo)}}" alt="{{$user->photo}}">
                                                </div>
                                            @endif
                                        <tbody>
                                            <tr>
                                                <td>№</td>
                                                <td>{{$user['id']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Логин</td>
                                                <td>{{$user['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Почта</td>
                                                <td>{{$user['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Имя</td>
                                                <td>{{$user['firstname']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Фамилия</td>
                                                <td>{{$user['secondname']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Отчество</td>
                                                <td>{{$user['patronymic']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата рождения</td>
                                                <td>{{\Carbon\Carbon::parse($user->birthdate)->format('d.m.Y')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Телефон</td>
                                                <td>{{$user['phone']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Пол</td>
                                                <td>{{$user['gender']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Пасспорт</td>
                                                <td>{{$user['passport']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Адрес</td>
                                                <td>{{$user['address']}}</td>
                                            </tr>
                                            <tr>
                                                <td>Роль</td>
                                                <td>@if($user['role'] == 0) Клиент @else @if($user['role'] == 1) Сотрудник @else Администратор @endif @endif</td>
                                            </tr>
                                        </tbody>
                                        </table>
                                        <div class="container">
                                                <a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-dark m-1">Редактировать</a>
                                                <form class="d-inline-block" action="{{action('UserController@destroy', $user['id'])}}" method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-dark m-1" type="submit">Удалить</button>
                                                </form>
                                        </div>
                                            </div>
                                        </div>


                                    @endif
                                @endforeach
                            @else @if(auth()->user()->role == 1)
                                @foreach($users as $user)
                                    @if($user['role'] == 0)
                                        <div class="card m-1">
                                            <div class="card-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @endif
                                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <td>№</td>
                                            <td>{{$user['id']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Логин</td>
                                            <td>{{$user['name']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Почта</td>
                                            <td>{{$user['email']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Имя</td>
                                            <td>{{$user['firstname']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Фамилия</td>
                                            <td>{{$user['secondname']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Отчество</td>
                                            <td>{{$user['patronymic']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Дата рождения</td>
                                            <td>{{\Carbon\Carbon::parse($user->birthdate)->format('d/m/Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Телефон</td>
                                            <td>{{$user['phone']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Пол</td>
                                            <td>{{$user['gender']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Пасспорт</td>
                                            <td>{{$user['passport']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Адрес</td>
                                            <td>{{$user['address']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Роль</td>
                                            <td>@if($user['role'] == 0) Клиент @else @if($user['role'] == 1) Сотрудник @else Администратор @endif @endif</td>
                                        </tr>
                                        </tbody>
                                                    </table>
                                                    <div class="container">
                                                        <a href="{{action('UserController@edit', $user['id'])}}" class="btn btn-dark m-1">Редактировать</a>
                                                        <form class="d-inline-block" action="{{action('UserController@destroy', $user['id'])}}" method="post">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button class="btn btn-dark m-1" type="submit">Удалить</button>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                            @endif
                    </div>
                </div>
            </div>
    </div>
@endsection
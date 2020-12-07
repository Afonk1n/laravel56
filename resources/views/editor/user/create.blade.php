@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление пользователя</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{url('users')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="name">Логин:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="name">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Почта:</label>
                                    <input type="email" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="email">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="firstname">Имя:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="firstname">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="secondname">Фамилия:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="secondname">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="patronymic">Отчество:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="patronymic">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthdate">Дата рождения:</label>
                                    <input type="date" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="birthdate">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Телефон:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="phone">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender">Пол:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="gender">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="passport">Паспортные данные:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="passport">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="address">Адрес:</label>
                                    <input type="text" class="form-control {{ $errors->all() ? ' is-invalid' : '' }}" name="address">
                                    @if ($errors->all())
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    @endif
                                </div>
                                @auth
                                    @if(Auth::user()->role == 2)
                                        <div class="form-group col-md-4">
                                            <label for="role">Роль:</label>
                                            <select class="form-control" name="role">
                                                <option disabled>Выберите роль</option>
                                                <option value="0">Клиент</option>
                                                <option value="1">Сотрудник</option>
                                            </select>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4" style="margin-top:10px">
                                    <a href="/users" class="btn btn-dark">Назад</a>
                                    <button type="submit" class="btn btn-dark">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
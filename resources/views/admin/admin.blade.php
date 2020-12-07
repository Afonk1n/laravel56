@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">Панель администрирования справочников</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="item m-2"><a href="/districts" class="btn btn-dark w-25">Районы</a></div>
                            <div class="item m-2"><a href="/streets" class="btn btn-dark w-25">Улицы</a></div>
                            <div class="item m-2"><a href="/renovations" class="btn btn-dark w-25">Ремонты</a></div>
                            <div class="item m-2"><a href="/layouts" class="btn btn-dark w-25">Планировки</a></div>
                            <div class="item m-2"><a href="/rooms" class="btn btn-dark w-25">Комнатности</a></div>
                            <div class="item m-2"><a href="/storeynumbers" class="btn btn-dark w-25">Этажности</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Санитарные узлы</a></div>
                            <div class="item m-2"><a href="/services" class="btn btn-dark w-25">Сервисы</a></div>
                            <div class="item m-2"><a href="/statuses" class="btn btn-dark w-25">Статусы</a></div>
                            <div class="item m-2"><a href="/apartments" class="btn btn-dark w-25">Квартиры</a></div>
                            <div class="item m-2"><a href="/users" class="btn btn-dark w-25">Пользователи</a></div>
                            <div class="item m-2"><a href="/contracts" class="btn btn-dark w-25">Контракты</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
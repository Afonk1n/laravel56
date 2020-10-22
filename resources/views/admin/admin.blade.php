@extends('admin.layouts.adminlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Панель администрирования справочников</div>
                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Санитарные узлы</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Районы</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Улицы</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Ремонты</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Планировки</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Комнатности</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Этажности</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Сервисы</a></div>
                            <div class="item m-2"><a href="/bathrooms" class="btn btn-dark w-25">Статусы</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
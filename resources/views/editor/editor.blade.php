@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">Редактор</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="item m-2"><a href="/apartments" class="btn btn-dark w-25">Квартиры</a></div>
                            <div class="item m-2"><a href="/users" class="btn btn-dark w-25">Пользователи</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
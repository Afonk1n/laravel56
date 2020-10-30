@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Справочник "Статусы"</div>
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
                                <td>Имя</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statuses as $status)
                                <tr>
                                    <td>{{$status['id']}}</td>
                                    <td>{{$status['name']}}</td>
                                    <td align="right"><a href="{{action('StatusController@edit', $status['id'])}}" class="btn btn-dark">Редактировать</a></td>
                                    <td align="left">
                                        <form action="{{action('StatusController@destroy', $status['id'])}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-dark" type="submit">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="/admin" class="btn btn-dark">Назад</a>
                        <a href="/statuses/create" class="btn btn-dark">Добавить запись</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
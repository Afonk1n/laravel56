@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card m-1">
                    <div class="card-header">Список контрактов</div>
                    <div class="card-body">
                        <a href="@if (auth()->user()->role > 1) /admin @else /editor @endif" class="btn btn-dark">Назад</a>
                        <a href="/contracts/create" class="btn btn-dark">Добавить запись</a>
                    </div>
                </div>
                @foreach($contracts as $contract)
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
                                    <td>{{$contract['id']}}</td>
                                </tr>
                                <tr>
                                    <td>Сумма сделки</td>
                                    <td>{{$contract['transaction']}}₽</td>
                                </tr>
                                <tr>
                                    <td>Стоимость услуг</td>
                                    <td>{{$contract['servicecost']}}₽</td>
                                </tr>
                                <tr>
                                    <td>Дата сделки</td>
                                    <td>{{\Carbon\Carbon::parse($contract->dealdate)->format('d.m.Y')}}</td>
                                </tr>
                                <tr>
                                    <td>Площадь сделки</td>
                                    <td>{{$contract['dealarea']}} м<sup>2</sup></td>
                                </tr>
                                <tr>
                                    <td>Услуга</td>
                                    <td>{{$contract->service->name}}</td>
                                </tr>
                                <tr>
                                    <td>Квартира</td>
                                    <td>Ул.{{$contract->apartment->street->name}},д.{{$contract->apartment->number}}</td>
                                </tr>
                                <tr>
                                    <td>Статус</td>
                                    <td>{{$contract->status->name}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="container">
                                <a href="{{action('ContractController@edit', $contract['id'])}}" class="btn btn-dark m-1">Сменить статус</a>
                                <form class="d-inline-block" action="{{action('ContractController@destroy', $contract['id'])}}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-dark m-1" type="submit">Удалить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
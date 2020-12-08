@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Список контрактов</div>
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
                                <td>Сумма сделки</td>
                                <td>Стоимость услуг</td>
                                <td>Дата сделки</td>
                                <td>Площадь сделки</td>
                                <td>Услуга</td>
                                <td>Квартира</td>
                                <td>Статус</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contracts as $contract)
                                <tr>
                                    <td>{{$contract['id']}}</td>
                                    <td>{{$contract['transaction']}}₽</td>
                                    <td>{{$contract['servicecost']}}₽</td>
                                    <td>{{\Carbon\Carbon::parse($contract->dealdate)->format('d.m.Y')}}</td>
                                    <td>{{$contract['dealarea']}} м<sup>2</sup></td>
                                    <td>{{$contract->service->name}}</td>
                                    <td>Ул.{{$contract->apartment->street->name}},д.{{$contract->apartment->number}}</td>
                                    <td>{{$contract->status->name}}</td>
                                    <td align="right"><a href="{{action('ContractController@edit', $contract['id'])}}" class="btn btn-dark">Сменить статус</a></td>
                                    <td align="left">
                                        <form action="{{action('ContractController@destroy', $contract['id'])}}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-dark" type="submit">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="@if (auth()->user()->role > 1) /admin @else /editor @endif" class="btn btn-dark">Назад</a>
                        <a href="/contracts/create" class="btn btn-dark">Добавить запись</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
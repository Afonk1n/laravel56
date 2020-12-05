@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card m-1">
                    <div class="card-header">Список квартир</div>
                        <div class="card-body">
                            <a href="@if (auth()->user()->role > 1) /admin @else /editor @endif" class="btn btn-dark">Назад</a>
                            <a href="/apartments/create" class="btn btn-dark">Добавить запись</a>
                        </div>
                        </div>
                            @foreach($apartments as $apartment)
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
                                                    <td>{{$apartment['id']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Статус</td>
                                                    <td>@if($apartment['sold']== 0) Активно @else Не активно @endif</td>
                                                </tr>
                                                <tr>
                                                    <td>Площадь</td>
                                                    <td>{{$apartment['area']}} м<sup>2</sup></td>
                                                </tr>
                                                <tr>
                                                    <td>Адрес</td>
                                                    <td>Ул.{{$apartment->street->name}}, д. {{$apartment['number']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Этаж</td>
                                                    <td>{{$apartment['storey']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Количество комнат</td>
                                                    <td>{{$apartment->room->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Количество этажей</td>
                                                    <td>{{$apartment->storeynumber->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Планировка</td>
                                                    <td>{{$apartment->layout->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ремонт</td>
                                                    <td>{{$apartment->renovation->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Санитарный узел</td>
                                                    <td>{{$apartment->bathroom->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Район</td>
                                                    <td>{{$apartment->district->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Спецификация</td>
                                                    <td>{{$apartment['specification']}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Дополнительно</td>
                                                    <td>{{$apartment['additional']}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                            <div class="container">
                                            <a href="{{action('ApartmentController@edit', $apartment['id'])}}" class="btn btn-dark m-1">Редактировать</a>
                                            <a href="{{action('ApartmentController@show', $apartment['id'])}}" class="btn btn-dark m-1">Печать</a>
                                            <form class="d-inline-block" action="{{action('ApartmentController@destroy', $apartment['id'])}}" method="post">
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
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">Информация о квартире</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if($apartment->image)
                            <div class="text-center">
                                <img class="img-fluid rounded" src="{{url('uploads/'.$apartment->image)}}" alt="{{$apartment->image}}">
                            </div>
                            @endif
                        <table class="table table-striped">
                            <tbody>
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
                        <a href="/offers" class="btn btn-dark">Назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">Список квартир</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-striped table-hover offer-table">
                            <thead>
                            <tr>
                                <td>Адрес</td>
                                <td>Этаж</td>
                                <td>Площадь</td>
                                <td>Спецификация</td>
                                <td>Комнатность</td>
                                <td>Этажность</td>
                                <td>Планировка</td>
                                <td>Ремонт</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($apartments as $apartment)
                                @if($apartment['sold']== 0)
                                    <tr onclick="location.href='{{action('OfferController@show', $apartment['id'])}}'">
                                        <td>Ул.{{$apartment->street->name}}, д. {{$apartment['number']}}</td>
                                        <td>{{$apartment['storey']}}</td>
                                        <td>{{$apartment['area']}} м<sup>2</sup></td>
                                        <td>{{$apartment['specification']}}</td>
                                        <td>{{$apartment->room->name}}</td>
                                        <td>{{$apartment->storeynumber->name}}</td>
                                        <td>{{$apartment->layout->name}}</td>
                                        <td>{{$apartment->renovation->name}}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
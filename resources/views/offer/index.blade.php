@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-15">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            @foreach($apartments as $apartment)
                                @if($apartment['sold']== 0)
                            <div class="card m-1">
                            <div class="card-body">
                                    <div class="row offer-block" onclick="location.href='{{action('OfferController@show', $apartment['id'])}}'">
                                        @if($apartment->image)
                                            <div class="text-center col-md-6">
                                                <img class="img-fluid rounded" width="500" height="300" src="{{url('uploads/'.$apartment->image)}}" alt="{{$apartment->image}}">
                                            </div>
                                        @endif
                        <table class="table table-striped col-md-6 offer-table">
                            <tbody>
                                        <tr>
                                            <td>Адрес</td>
                                            <td>Ул.{{$apartment->street->name}}, д. {{$apartment['number']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Этаж</td>
                                            <td>{{$apartment['storey']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Площадь</td>
                                            <td>{{$apartment['area']}} м<sup>2</sup></td>
                                        </tr>
                                        <tr>
                                            <td>Кол-во комнат</td>
                                            <td>{{$apartment->room->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ремонт</td>
                                            <td>{{$apartment->renovation->name}}</td>
                                        </tr>
                            </tbody>
                        </table>
                                    </div>
                                    </div>
                            </div>
                                @endif
                            @endforeach
            </div>
        </div>
    </div>
@endsection
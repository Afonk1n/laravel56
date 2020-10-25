@extends('admin.header.adminlayout')

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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>№</td>
                                <td>Площадь</td>
                                <td>Номер</td>
                                <td>Этаж</td>
                                <td>Спецификация</td>
                                <td>Дополнительно</td>
                                <td>Статус</td>
                                <td>Комнатность</td>
                                <td>Улица</td>
                                <td>Этажность</td>
                                <td>Планировка</td>
                                <td>Ремонт</td>
                                <td>Сан.узел</td>
                                <td>Район</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($apartments as $apartment)
                                <tr>
                                    <td>{{$apartment['id']}}</td>
                                    <td>{{$apartment['area']}}</td>
                                    <td>{{$apartment['number']}}</td>
                                    <td>{{$apartment['storey']}}</td>
                                    <td>{{$apartment['specification']}}</td>
                                    <td>{{$apartment['additional']}}</td>
                                    <td>{{$apartment['sold']}}</td>
                                    <td>{{$apartment['room_id']}}</td>
                                    <td>{{$apartment['street_id']}}</td>
                                    <td>{{$apartment['storeynumber_id']}}</td>
                                    <td>{{$apartment['layout_id']}}</td>
                                    <td>{{$apartment['renovation_id']}}</td>
                                    <td>{{$apartment['bathroom_id']}}</td>
                                    <td>{{$apartment['district_id']}}</td>
                                    <td align="right"><a href="{{action('ApartmentController@edit', $apartment['id'])}}" class="btn btn-dark">Редактировать</a></td>
                                    <td align="left">
                                        <form action="{{action('ApartmentController@destroy', $apartment['id'])}}" method="post">
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
                        <a href="/apartments/create" class="btn btn-dark">Добавить запись</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
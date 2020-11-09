@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление записи о квартире</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{url('apartments')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4">
                                    <label for="area">Площадь:</label>
                                    <input type="text" class="form-control" name="area" placeholder="Например: 50">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number">Номер дома:</label>
                                    <input type="text" class="form-control" name="number" placeholder="Например: 5">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="storey">Этаж:</label>
                                    <input type="text" class="form-control" name="storey" placeholder="Например: 5">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="specification">Спецификация:</label>
                                    <textarea class="form-control" name="specification" placeholder="Например: От застройщика"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="additional">Дополнительно:</label>
                                    <textarea class="form-control" name="additional" placeholder="Например: Рядом детский сад"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="room_id">Количество комнат:</label>
                                    <select class="form-control" name="room_id">
                                            <option disabled>Выберите комнатность</option>
                                            @foreach($rooms as $room)
                                            <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street_id">Улица:</label>
                                    <select class="form-control" name="street_id">
                                        <option disabled>Выберите улицу</option>
                                        @foreach($streets as $street)
                                            <option value="{{$street->id}}">{{$street->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="storeynumber_id">Количество этажей:</label>
                                    <select class="form-control" name="storeynumber_id">
                                        <option disabled>Выберите этажность</option>
                                        @foreach($storeynumbers as $storeynumber)
                                            <option value="{{$storeynumber->id}}">{{$storeynumber->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="layout_id">Планировка:</label>
                                    <select class="form-control" name="layout_id">
                                        <option disabled>Выберите планировку</option>
                                        @foreach($layouts as $layout)
                                            <option value="{{$layout->id}}">{{$layout->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="renovation_id">Ремонт:</label>
                                    <select class="form-control" name="renovation_id">
                                        <option disabled>Выберите тип ремонта</option>
                                        @foreach($renovations as $renovation)
                                            <option value="{{$renovation->id}}">{{$renovation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bathroom_id">Сан.узел:</label>
                                    <select class="form-control" name="bathroom_id">
                                        <option disabled>Выберите тип сан.узла</option>
                                        @foreach($bathrooms as $bathroom)
                                            <option value="{{$bathroom->id}}">{{$bathroom->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="district_id">Район:</label>
                                    <select class="form-control" name="district_id">
                                        <option disabled>Выберите район</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="sold">Статус:</label>
                                    <select class="form-control" name="sold">
                                        <option disabled>Выберите статус</option>
                                        <option value="0">Активна</option>
                                        <option value="1">Не активна</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="image">Фото:</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="row">
                                @if ($errors->all())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-danger">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4" style="margin-top:10px">
                                    <a href="/apartments" class="btn btn-dark">Назад</a>
                                    <button type="submit" class="btn btn-dark">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
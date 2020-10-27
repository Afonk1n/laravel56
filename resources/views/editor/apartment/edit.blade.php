@extends('admin.header.adminlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование данных о квартире</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{action('ApartmentController@update', $id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4">
                                    <label for="area">Площадь:</label>
                                    <input type="text" class="form-control" name="area" value="{{$apartment->area}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number">Номер дома:</label>
                                    <input type="text" class="form-control" name="number" value="{{$apartment->number}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="storey">Этаж:</label>
                                    <input type="text" class="form-control" name="storey" value="{{$apartment->storey}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="specification">Спецификация:</label>
                                    <textarea class="form-control" name="specification">{{$apartment->specification}}</textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="additional">Дополнительно:</label>
                                    <textarea class="form-control" name="additional">{{$apartment->additional}}</textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="room_id">Количество комнат:</label>
                                    <select class="form-control" name="room_id">
                                        <option disabled>Выберите комнатность</option>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}" @if($room->name == $apartment->room->name) selected @endif>{{$room->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street_id">Улица:</label>
                                    <select class="form-control" name="street_id">
                                        <option disabled>Выберите улицу</option>
                                        @foreach($streets as $street)
                                            <option value="{{$street->id}}" @if($street->name == $apartment->street->name) selected @endif>{{$street->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="storeynumber_id">Количество этажей:</label>
                                    <select class="form-control" name="storeynumber_id">
                                        <option disabled>Выберите этажность</option>
                                        @foreach($storeynumbers as $storeynumber)
                                            <option value="{{$storeynumber->id}}" @if($storeynumber->name == $apartment->storeynumber->name) selected @endif>{{$storeynumber->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="layout_id">Планировка:</label>
                                    <select class="form-control" name="layout_id">
                                        <option disabled>Выберите планировку</option>
                                        @foreach($layouts as $layout)
                                            <option value="{{$layout->id}}" @if($room->layout == $apartment->layout->name) selected @endif>{{$layout->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="renovation_id">Ремонт:</label>
                                    <select class="form-control" name="renovation_id">
                                        <option disabled>Выберите тип ремонта</option>
                                        @foreach($renovations as $renovation)
                                            <option value="{{$renovation->id}}" @if($room->renovation == $apartment->renovation->name) selected @endif>{{$renovation->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bathroom_id">Сан.узел:</label>
                                    <select class="form-control" name="bathroom_id">
                                        <option disabled>Выберите тип сан.узла</option>
                                        @foreach($bathrooms as $bathroom)
                                            <option value="{{$bathroom->id}}" @if($bathroom->name == $apartment->bathroom->name) selected @endif>{{$bathroom->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="district_id">Район:</label>
                                    <select class="form-control" name="district_id">
                                        <option disabled>Выберите район</option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}" @if($district->name == $apartment->district->name) selected @endif>{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4" style="margin-top:10px">
                                    <a href="/apartments" class="btn btn-dark">Назад</a>
                                    <button type="submit" class="btn btn-dark">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
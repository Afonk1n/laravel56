@extends('admin.header.adminlayout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Добавление записи в справочник "Санитарные узлы"</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{url('bathrooms')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12"></div>
                                <div class="form-group col-md-4">
                                    <label for="area">Площадь:</label>
                                    <input type="text" class="form-control" name="area">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="number">Номер:</label>
                                    <input type="text" class="form-control" name="number">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="storeynumber">Этаж:</label>
                                    <input type="text" class="form-control" name="storeynumber">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="specification">Спецификация:</label>
                                    <textarea class="form-control" name="specification"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="additional">Дополнительно:</label>
                                    <textarea class="form-control" name="additional"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="room_id">Количество комнат:</label>
                                    <select class="form-control" name="room_id">
                                        <option value="1">Однокомнатная</option>
                                        <option value="3">Двухкомнатная</option>
                                        <option value="4">Трёхкомнатная</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="street_id">Улица:</label>
                                    <select class="form-control" name="street_id">
                                        <option value="3">Жукова</option>
                                        <option value="4">Труда</option>
                                        <option value="5">Калмыкова</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">:</label>
                                    <select class="form-control" name="">
                                        <option value=""></option>
                                        <option value=""></option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
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
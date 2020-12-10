@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Редактирование контракта</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="{{action('ContractController@update', $id)}}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="transaction">Сумма сделки:</label>
                                    <input type="text" class="form-control" name="transaction" placeholder="Например: 50000" value="{{$contract->transaction}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="servicecost">Стоимость услуг:</label>
                                    <input type="text" class="form-control" name="servicecost" placeholder="Например: 5000" value="{{$contract->servicecost}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dealdate">Дата сделки:</label>
                                    <input type="date" class="form-control" name="dealdate" value="{{$contract->dealdate}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dealarea">Площадь сделки:</label>
                                    <input type="text" class="form-control" name="dealarea" placeholder="Например: 250" value="{{$contract->dealarea}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="service_id">Услуга:</label>
                                    <select class="form-control" name="service_id">
                                        <option disabled>Выберите услугу</option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}" @if($service->id == $contract->service_id) selected @endif>{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="apartment_id">Номер квартиры:</label>
                                    <select class="form-control" name="apartment_id">
                                        <option disabled>Выберите квартиру</option>
                                        @foreach($apartments as $apartment)
                                            <option value="{{$apartment->id}}" @if($apartment->id == $contract->apartment_id) selected @endif>{{$apartment->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="status_id">Статус сделки:</label>
                                    <select class="form-control" name="status_id">
                                        <option disabled>Выберите район</option>
                                        @foreach($statuses as $status)
                                            <option value="{{$status->id}}" @if($status->id == $contract->status_id) selected @endif>{{$status->name}}</option>
                                        @endforeach
                                    </select>
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
                                <div class="form-group col-md-4" style="margin-top:10px">
                                    <a href="/contracts" class="btn btn-dark m-1 d-inline-block">Назад</a>
                                    <button type="submit" class="btn btn-dark m-1 d-inline-block">Сохранить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.layouts.adminlayout')

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
                                        <label for="Name">Name:</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"></div>
                                    <div class="form-group col-md-4" style="margin-top:10px">
                                        <a href="/bathrooms" class="btn btn-dark">Назад</a>
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
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Где и когда нас найти</div>

                    <div class="card-body text-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2378.984157802171!2d58.98202691597819!3d53.39722327860007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d12f1b1020a889%3A0xd2af11de249f93f1!2z0YPQuy4g0JPRgNGP0LfQvdC-0LLQsCwgMzYsINCc0LDQs9C90LjRgtC-0LPQvtGA0YHQuiwg0KfQtdC70Y_QsdC40L3RgdC60LDRjyDQvtCx0LsuLCA0NTUwNDQ!5e0!3m2!1sru!2sru!4v1603990992871!5m2!1sru!2sru" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
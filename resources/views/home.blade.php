@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach($districts as $district)
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" data-toggle="collapse"
                                href="#collapse{{ $district->id }}">{{ $district->fullname }}</h5>
                        </div>
                        <div class="collapse" id="collapse{{ $district->id }}">
                            <div class="row">
                                <div class="col-md-12">&nbsp;&nbsp;&nbsp;Образовательная организация</div>
                            </div>
                            @foreach($district->users as $school)
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>&nbsp;&nbsp;&nbsp;{{ $school->fullname }}
                                            @if ($school->cluster)
                                                <small class="alert alert-warning">Подана заявка на создание кластера</small>
                                                <button type="button" class="btn btn-outline-success btn-sm">Одобрить</button>
                                                <button type="button" class="btn btn-outline-danger btn-sm">Отклонить</button>
                                            @endif
                                        </h6>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection

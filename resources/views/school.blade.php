@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{$user->fullname}} <br>
                            <small>{{$user->getDistrict->fullname}}</small>
                        </h2>
                        @if ($user->cluster)
                            <p><b>Заявка на создание кластера отправлена</b></p>
                        @else
                            <a href="/clusters/create" class="btn btn-outline-primary btn-lg">Подать заявку на создание
                                кластера</a>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <ul class="card-body">
                        <h5 class="card-title">Мои заявки</h5>
                        <p class="card-text">
                        <ul>
                            @if ($user->bids)
                                @foreach( $user->bids as $bid)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-3">
                                                {{ $bid->class }} класс {{ $bid->subject }}
                                            </div>
                                            <div class="col-md-3">
                                                {!! $bid->getStatus() !!}
                                            </div>
                                            @if ($bid->status === 1)
                                                <div class="col-md-3">
                                                    <a href="/files/programs/{{ $bid->program->filename }}"
                                                       class="btn btn-outline-success">Программа</a>
                                                </div>
                                                @if ($bid->program->schedule)
                                                    <div class="col-md-3">
                                                        <a href="/files/schedules/{{ $bid->program->schedule->filename }}"
                                                           class="btn btn-outline-success">Расписание</a><br>
                                                        @if ($bid->program->schedule->status !== 1)
                                                            <a href="/schedule/add/{{ $bid->program->schedule->id }}"
                                                               class="btn btn-outline-info btn-sm">Согласовать</a>
                                                            <form action="{{ action('ScheduleController@delete',$bid->program->schedule->id) }}"
                                                                  method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-outline-danger btn-sm">
                                                                    Отклонить
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <br>
                        <a href="/bids/create" class="btn btn-outline-primary">Подать заявление</a>
                        <a href="/bids/add" class="btn btn-outline-primary">Добавить программу</a>
                    </ul>
                    <div class="card-footer">
                        <a data-toggle="collapse" href="#collapsePrograms" aria-expanded="false"
                           aria-controls="collapsePrograms">
                            <h4>Предлагаемые программы</h4>
                        </a>
                        <div class="collapse" id="collapsePrograms">
                            @foreach( $programs as $program)
                                {{ $program->bid->subject }}
                                {{ $program->bid->class }} класс
                                {{ $program->bid->modul }}
                                <a href="/files/programs/{{ $program->filename }}">Скачать программу</a><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

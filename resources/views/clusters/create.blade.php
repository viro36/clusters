@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h3 class="display-5">{{ $user->fullname }}</h3>
            
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('clusters.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h4 align="center">Выберите образовательные организации в образовательный кластер</h4>
                    @foreach($district->users as $school)
                        @if (($school->id !== $user->id) && ($school->fullname != ''))
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="schools[]" value="{{ $school->id }}">
                                        <label class="form-check-label">{{ $school->fullname }}</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <br>
                    <button type="submit" class="btn btn-outline-primary btn-lg">Подать заявку на создание кластера</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="application/javascript">
        jQuery(document).ready(function() {
            $('.custom-file input').change(function (e) {
                var files = [];
                for (var i = 0; i < $(this)[0].files.length; i++) {
                    files.push($(this)[0].files[i].name);
                }
                $(this).next('.custom-file-label').html(files.join(', '));
            });
        })
    </script>
@endsection
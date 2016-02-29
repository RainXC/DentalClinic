@extends('app')

@section('content')
    <link rel="stylesheet" href="/css/admin/employees.css">
    <script src="/js/admin/employee.js"></script>
    <script src="/js/plupload/plupload.full.min.js"></script>
    {{--<script type="text/javascript" src="/js/plupload/jquery.ui.plupload/jquery.ui.plupload.js"></script>--}}
    <script src="/js/plupload/i18n/ru.js"></script>
    <div class="content-section-a">
        <div class="container">
            <h1>Новый сотрудник</h1>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <p class="error bg-danger">Сообщение об ошибке</p>
            <p class="success bg-success">Сообщение об успехе</p>
            <form class="form-horizontal objectForm" action="/admin/employees" method="post" data-post-action="reload">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="POST">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Фамилия</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lastname" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="firstname" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Отчество</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="patronymic" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Должность</label>
                    <div class="col-sm-10">
                        <select name="positionId" class="form-control">
                            @foreach ($positions->get() as $position)
                                <option value="{{$position->id}}"> {{$position->getName()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Пол</label>
                    <div class="col-sm-10">
                        <select name="male" class="form-control">
                            <option value="1">Мужской</option>
                            <option value="0">Женский</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Специальность</label>
                    <div class="col-sm-10">
                        <ul>
                            @foreach($specialities->get() as $speciality)
                                <li>
                                    <input id="spec{{$speciality->id}}" type="checkbox" name="speciality[]" value="{{$speciality->id}}" >
                                    - <label for="spec{{$speciality->id}}">{{$speciality->getName()}}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success btn-lg objectFormSubmit">Сохранить</button>
                        <a href="{{url('/admin/employees')}}" class="btn btn-warning btn-lg">Отмена</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
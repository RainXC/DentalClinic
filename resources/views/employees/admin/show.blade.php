@extends('app')

@section('content')
    <link rel="stylesheet" href="/css/admin/employees.css">
    <script src="/js/admin/employee.js"></script>
    <div class="content-section-a">
        <div class="container">
            <h1>Новый сотрудник</h1>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <p class="error bg-danger">Сообщение об ошибке</p>
            <p class="success bg-success">Сообщение об успехе</p>
            <form class="form-horizontal objectForm" action="/admin/employees/{{$employee->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{$employee->id}}">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Фамилия</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lastname" value="{{$employee->lastname}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="firstname" value="{{$employee->firstname}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Отчество</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="patronymic" value="{{$employee->patronymic}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Должность</label>
                    <div class="col-sm-10">
                        <select name="positionId" class="form-control">
                            @foreach ($positions->get() as $position)
                                <option value="{{$position->id}}" <?=$employee->positionId==$position->id?'selected="selected"':''?>> {{$position->getName()}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Пол</label>
                    <div class="col-sm-10">
                        <select name="male" class="form-control">
                            <option value="1" <?=$employee->male==1?'selected="selected"':''?>>Мужской</option>
                            <option value="0" <?=$employee->male==0?'selected="selected"':''?>>Женский</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Специальность</label>
                    <div class="col-sm-10">
                        <ul>
                            <?
                            $specArray = [];
                            foreach($employee->specialities as $spec){
                                $specArray[] = $spec->id;
                            }
                            ?>
                            @foreach($specialities->get() as $speciality)
                                <li>
                                    <input id="spec{{$speciality->id}}" type="checkbox" name="speciality[]" value="{{$speciality->id}}" <?=(in_array($speciality->id, $specArray))?'checked="checked"':'' ?>>
                                    - <label for="spec{{$speciality->id}}">{{$speciality->getName()}}</label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Фото</label>
                    <div class="col-sm-10">
                        <a class="btn btn-primary btn-sm">Загрузить</a>
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
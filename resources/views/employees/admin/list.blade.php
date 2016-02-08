@extends('app')

@section('content')
<link rel="stylesheet" href="/css/admin/employees.css">
<script src="/js/admin/employees.js"></script>

<div class="content-section-a">
    <div class="container">
        <h1>Наши сотрудники <a href="/admin/employees/create/" class="btn btn-primary btn-sm">Добавить</a></h1>
    </div>
</div>
<div class="container">
    <p class="error bg-danger">Сообщение об ошибке</p>
    <table class="listContainer table table-hover table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Фото</th>
            <th>ФИО</th>
            <th>Должность</th>
            <th>Специальности</th>
            <th>Дата регистрации</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <? $count = 0; ?>
        @foreach ($employees->get() as $employee)
            <tr class="listRow" id="listRow{{$employee->id}}">
                <td>{{++$count}}</td>
                <td>
                    <img src="{{$employee->getAvatar()}}" height="50">
                </td>
                <td>{{$employee->getName()}}</td>
                <td>{{$employee->position->getName()}}</td>
                <td>
                    <ul>
                        @foreach ($employee->specialities as $speciality)
                            <li>{{$speciality->getName()}}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    {{$employee->created_at}}
                </td>
                <td>
                    <a href="{{url('/admin/employees/'.$employee->id)}}/edit" class="btn btn-primary btn-sm">Редактировать</a>
                    <a
                        class="btn btn-danger btn-sm delete"
                        data-action="/admin/employees/{{$employee->id}}"
                        data-post="_method=DELETE&_token={{ csrf_token() }}"
                        data-confirm="Удалить запись?"
                    >Удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@endsection
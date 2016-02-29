@extends('app')

@section('content')
    <link rel="stylesheet" href="/css/admin/employees.css">
    <script src="/js/admin/employee.js"></script>
    <script src="/js/plupload/plupload.full.min.js"></script>
    {{--<script type="text/javascript" src="/js/plupload/jquery.ui.plupload/jquery.ui.plupload.js"></script>--}}
    <script src="/js/plupload/i18n/ru.js"></script>

    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-sx-5 col-md-10">
                    <h1>
                        Редактирование услуги
                        <button type="submit" class="btn btn-success btn-sm objectFormSubmit">Сохранить</button>
                        <a href="{{url('/admin/services')}}" class="btn btn-warning btn-sm">Отмена</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <p class="error bg-danger">Сообщение об ошибке</p>
            <p class="success bg-success">Сообщение об успехе</p>
            <form class="form-horizontal objectForm" action="/admin/services/{{$service->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{$service->id}}">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Категория</label>
                    <div class="col-sm-10">
                        <select name="measurementId" class="form-control">
                            @foreach($categories->get() as $category)
                                <option value="{{$category->id}}" @if($category->id==$service->categoryId)selected="selected"@endif>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$service->getName()}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Описание</label>
                    <div class="col-sm-10">
                        <textarea id="description" name="description" class="form-control">{{$service->getDescription()}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Цена</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="price" value="{{$service->getPrice()}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Количество</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="measure" value="{{$service->getMeasure()}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Еденица измерения</label>
                    <div class="col-sm-10">
                        <select name="measurementId" class="form-control">
                            @foreach($measurements->get() as $measurement)
                                <option value="{{$measurement->id}}" @if($measurement->id==$service->measurementId)selected="selected"@endif>
                                    {{$measurement->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
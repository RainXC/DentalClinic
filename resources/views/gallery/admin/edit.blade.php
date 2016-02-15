@extends('app')

@section('content')
    <link rel="stylesheet" href="/css/admin/employees.css">
    <script src="/js/admin/employee.js"></script>
    <script src="/js/plupload/plupload.full.min.js"></script>
    {{--<script type="text/javascript" src="/js/plupload/jquery.ui.plupload/jquery.ui.plupload.js"></script>--}}
    <script src="/js/plupload/i18n/ru.js"></script>

    <div class="content-section-a">
        <div class="container">
            <h1>
                Редактирование альбома
                <button type="submit" class="btn btn-success btn-sm objectFormSubmit">Сохранить</button>
                <a href="{{url('/admin/gallery')}}" class="btn btn-warning btn-sm">Назад</a>
            </h1>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <p class="error bg-danger">Сообщение об ошибке</p>
            <p class="success bg-success">Сообщение об успехе</p>
            <form class="form-horizontal objectForm" action="/admin/gallery/{{$album->id}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="{{$album->id}}">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Название</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{$album->getName()}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Описание</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control">{{$album->getDescription()}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Фото</label>
                    <div class="col-sm-10">
                        <div id="container">
                            <a
                                id="browse"
                                class="btn btn-primary btn-sm"
                                href="javascript:;"
                                data-action="/admin/gallery/uploadImage?objectId={{$album->id}}"
                            >Загрузить фото</a>
                            <div id="fileDetails"></div>
                        </div>
                        <div class="images">
                            @foreach($album->images as $image)
                                <img src="{{$image->getImage('640x480')}}" alt="" width="100">
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
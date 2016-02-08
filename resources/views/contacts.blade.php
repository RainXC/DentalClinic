@extends('skelet')

@section('content')
    <script type="text/javascript" src="/js/contacts.js"></script>
    <div class="content-page-header">
        <div class="container">
            <div class="row pageHeader">
                <div class="col-md-12">
                    <h1>Наши контакты</h1>
                    <p>В нашу клинику приходят даже здоровые пациенты!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <div class="col-md-6">
                <h3>Понедельник - Пятница:</h3>
                <h2 class="time">9:00-17:00</h2>
                <h3>Суббота:</h3>
                <h2 class="time">9:00-14:00</h2>
            </div>
            <div class="col-md-6">
                <h3>Телефоны:</h3>
                <h2 class="phone">0 69 643740</h2>
                <h2 class="phone">0 79 943740</h2>
            </div>
        </div>
    </div>
    <div class="content-section-a">
        <div class="container">
            <div class="col-md-6">
                <h3>Скайп:</h3>
                <h2 class="skype">zubkom3</h2>
            </div>
            <div class="col-md-6">
                <h3>E-mail:</h3>
                <h2 class="email">zubkom3@rambler.ru</h2>
            </div>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <form name="form" class="contactsForm" action="/contacts/ajaxSendMessage/">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="col-md-12">
                    <h2>Написать нам сообщение: </h2>
                    <h2 class="successMessage">Ваше сообщение успешно отправлено! Благодарим за использование сайта.</h2>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            placeholder="Пожалуйста введите свое имя"
                            ng-model="user.name"
                            required
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Номер телефона:</label>
                        <input
                            type="text"
                            class="form-control"
                            id="phone"
                            name="phone"
                            ng-model="user.phone"
                            ui-mask="0 (99) 999-999"
                            placeholder="Пожалуйтса введите свой номер телефона"
                            required
                        >
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="text">Сообщение:</label>
                        <textarea
                            name="text"
                            rows="4"
                            class="form-control"
                            id="text"
                            placeholder="Напишите ваш вопрос"
                            ng-model="user.text"
                            required
                        ></textarea>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-default contactsFormSubmit" value="Отправить сообщение"/>
                </div>
                <div class="col-md-4"></div>
            </form>
        </div>
    </div>
    <div class="row">
        <div id="map"></div>
    </div>

@endsection
@extends('skelet')

@section('content')
    <script type="text/javascript" src="/bower_components/angular/angular.min.js"></script>
    <script type="text/javascript" src="/js/ui-utils.min.js"></script>
    <script type="text/javascript" src="/js/contacts.js"></script>
    <div class="content-page-header">
        <div class="container">
            <div class="row pageHeader">
                <h1>О нас</h1>
                <p>Рады познакомиться с вами!</p>
            </div>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <div class="col-md-6">
                <div class="contactsImage"><img src="/images/about/cabinet.jpg" /></div>
            </div>
            <div class="col-md-6">
                <p>
                    Мы начали свою работу 12 октября 2001 г.
                    В нашей клинике используются последние технологии.
                </p>
            </div>
        </div>
    </div>
    <div class="content-section-a">
        <div class="container">
            <div class="col-md-6">
                <h3>Набор персонала</h3>
                <p>Мы рады новым людям в нашем колективе.</p>
                <p></p>
            </div>
            <div class="col-md-6">
                <div class="contactsImage"><img src="/images/about/doctors.jpg" /></div>
            </div>
        </div>
    </div>
    <div class="content-section-b">
        <div class="container">
            <div class="col-md-6">
                <div class="contactsImage"><img src="/images/about/partnership.jpg" /></div>
            </div>
            <div class="col-md-6">
                <h3>Сотрудничество</h3>
                <p>Мы имеем опыт сотрудничества с другими стоматологическими клиниками. Это позволяет обмениваться опытом, новыми технологиями и повышать свой профессионализм.</p>
                <p>Если вы хотите предложить сотрудничество свяжитесь по одному из телефонов указанных на странице <a href="/contacts/">контактов</a> или напишите сообщение</p>
            </div>
        </div>
    </div>
@endsection
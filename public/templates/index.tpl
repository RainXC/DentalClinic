<!-- Header -->
<header>
    <div class="layer"></div>
    <div class="container">
        <div class="intro-text">
            <h1 class="intro-lead-in"></h1>
            <h1 class="intro-heading">Добро пожаловать!</h1>
            <a href="#services" class="page-scroll btn btn-xl">Узнать больше</a>
        </div>
    </div>
</header>

<!-- Services Section -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Услуги</h2>
                <h3 class="section-subheading text-muted">Приятно видеть довольных пациентов</h3>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4" ng-repeat="service in services" style="min-height: 230px;">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                <h4 class="service-heading">{{service.name}}</h4>
                <p class="text-muted">{{service.description}}</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Grid Section -->
<section id="portfolio" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Галерея</h2>
                <h3 class="section-subheading text-muted">Выполненные работы</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 portfolio-item" ng-repeat="album in gallery track by $index">
                <a href="#portfolioModal{{$index}}" class="portfolio-link" data-toggle="modal">
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fa fa-plus fa-3x"></i>
                        </div>
                    </div>
                    <img ng-src="{{album.images[0].imageUrl}}" class="img-responsive" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4>{{album.name}}</h4>
                    <p class="text-muted">{{album.category.name}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">О клинике</h2>
                <h3 class="section-subheading text-muted">Немного истории клинки, наши цели, достижения</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="/skins/agency/img/about/1.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Июнь 2001</h4>
                                <h4 class="subheading">Появилась идея создания стоматологической клиники</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">В городе не было частных клиник для оказания услуг в области стоматологии. Для пациентов важно иметь выбор и мнения разных врачей.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="/skins/agency/img/about/2.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Март 2007</h4>
                                <h4 class="subheading">Открытие клиники</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Открыт терапевтический кабинет и зуботехническая лаборатория</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="/skins/agency/img/about/3.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Декабрь 2010</h4>
                                <h4 class="subheading">1000-й пациент</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Приятно помочь такому количеству людей. Идем на 2 тысячи.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="/skins/agency/img/about/4.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Июль 2014</h4>
                                <h4 class="subheading">Начали принимать пациентов из Европы</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Не дорогостоящее и качественное лечение привлекает людей со средними доходами из Европы</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="/skins/agency/img/about/4.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>Август 2015</h4>
                                <h4 class="subheading">Разработан Web-site клиники</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">Настало время представлять клинику в интернете</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Спасибо
                                <br>что вы
                                <br>с нами!
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="bg-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Наш трудолюбивый коллектив</h2>
                <h3 class="section-subheading text-muted">Высококвалифицированные специалисты будут рады оказать Вам помощь в нашей клинике</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4" ng-repeat="employee in employees">
                <div class="team-member">
                    <img ng-src="{{employee.avatar}}" class="img-responsive img-circle" alt="">
                    <h4>{{employee.firstname}} {{employee.lastname}}</h4>
                    <p class="text-muted"><strong>{{employee.position.name}}</strong>, <span ng-repeat="spec in employee.specialities">{{spec.name}}</span></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p class="large text-muted">
                    «Специалист — это тот, кто знает очень много об очень малом.» Батлер Н.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Clients Aside -->
<aside class="clients">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="/images/brands/EMS.png" class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="/images/brands/NSK_Logo.png" class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="/images/brands/woodpecker.png" class="img-responsive img-centered" alt="">
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <img src="/images/brands/sultanHealthcare.gif" class="img-responsive img-centered" alt="">
                </a>
            </div>
        </div>
    </div>
</aside>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Контакты</h2>
                <h3 class="section-subheading ">&nbsp;</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sendMessage" id="contactForm" novalidate ng-submit="feedbackSubmit()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Ваше имя"
                                    id="name"
                                    name="name"
                                    ng-model="feedback.name"
                                    required
                                >
                                <div class="help-block text-danger" ng-messages="sendMessage.name.$error" ng-show="sendMessage.name.$touched || sendMessage.$submitted">
                                    <div class="alert alert-danger" ng-message="required">Пожалуйста укажите свое имя</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Ваш емайл"
                                    id="email"
                                    name="email"
                                    ng-model="feedback.email"
                                    required
                                >
                                <div class="help-block text-danger" ng-messages="sendMessage.email.$error" ng-show="sendMessage.email.$touched || sendMessage.$submitted">
                                    <div class="alert alert-danger" ng-message="required">Пожалуйста укажите e-mail</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input
                                    type="tel"
                                    class="form-control"
                                    placeholder="Ваш номер телефона"
                                    id="phone"
                                    ng-model="feedback.phone"
                                    required
                                    name="phone"
                                >
                                <div class="help-block text-danger" ng-messages="sendMessage.phone.$error" ng-show="sendMessage.phone.$touched || sendMessage.$submitted">
                                    <div class="alert alert-danger" ng-message="required">Пожалуйста укажите номер вашего телефона</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea
                                    class="form-control"
                                    placeholder="Ваше сообщение"
                                    id="message"
                                    ng-model="feedback.text"
                                    required
                                    name="text"
                                ></textarea>
                                <div class="help-block text-danger" ng-messages="sendMessage.text.$error" ng-show="sendMessage.text.$touched || sendMessage.$submitted">
                                    <div class="alert alert-danger" ng-message="required">Пожалуйста напишите ваше сообщение</div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success" ng-show="feedbackResult" class="alert alert-success" role="alert">Сообщение успешно отправлено администрации сайта</div>
                            <button type="submit" class="btn btn-xl">Отправить сообщение</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Приём</h4>
                <p>
                    Понедельник - пятница: <strong>9:00 - 17:00</strong>
                    <br>
                    Суббота: <strong>9:00 - 14:00</strong>
                </p>
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Рабочий телефон</h4>
                <p>0 (298) 2-40-88</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>E-mail</h4>
                <p>rusanna.dent@gmail.com</p>
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Skype</h4>
                <p>rusanna.dent</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center" style="margin-top: 40px;">
                <span class="copyright">Copyright &copy; Rusanna Dent 2016</span>
            </div>
        </div>
    </div>
</footer>

<!-- Portfolio Modals -->
<!-- Use the modals below to showcase details about your portfolio projects! -->

<!-- Portfolio Modal 1 -->
<div class="portfolio-modal modal fade" id="portfolioModal{{$index}}" tabindex="-1" role="dialog" aria-hidden="true" ng-repeat="album in gallery track by $index">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2>{{album.name}}</h2>
                            <p class="item-intro text-muted">{{album.description}}</p>
                            <img class="img-responsive img-centered" ng-src="{{image.imageUrl}}" alt="" ng-repeat="image in album.images">
                            <ul class="list-inline">
                                <li>Дата: {{album.createdAt.date}}</li>
                            </ul>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Закрыть альбом</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

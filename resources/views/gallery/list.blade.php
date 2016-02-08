@extends('skelet')

@section('content')
<script type="text/javascript" src="/js/gallery.js"></script>
<script src="/js/lightbox/jquery-1.11.0.min.js"></script>
<script src="/js/lightbox/lightbox.min.js"></script>
<link href="/js/lightbox/css/lightbox.css" rel="stylesheet" />
<div class="content-page-header">
    <div class="container">
        <div class="row pageHeader">
            <div class="col-md-12">
                <h1>Галерея</h1>
                <p>Вы можете ознакомится с результатами наших трудов.</p>
            </div>
        </div>
    </div>
</div>
<div class="container" ng-controller="ctrlGallery">
    <div ng-repeat="album in albums | filter:query">
        <h3 class="albumHead">[[album.name]]</h3>
        <div class="albumImages">
            <span ng-repeat="image in album.images | filter:query">
                <a href="/img/cache/large/[[image.id]].[[image.ext]]" data-lightbox="[[album.alias]]">
                    <img ng-src="/img/cache/small/[[image.id]].[[image.ext]]" alt=""/>
                </a>
            </span>
        </div>
    </div>
</div>


@endsection
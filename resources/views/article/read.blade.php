@extends('skelet')

@section('content')
<div class="content-page-header">
    <div class="container">
        <div class="row pageHeader">
            <div class="col-md-12">
                <h1>{{$article->getName()}}</h1>
                @if($article->getDescription())
                    <p>{{$article->getDescription()}}</p>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row marginTopBottomNm">
        {{$article->getText()}}
    </div>
</div>
@endsection
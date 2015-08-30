@extends('skelet')

@section('content')
<div class="content-page-header">
    <div class="container">
        <div class="row pageHeader">
            <h1>Наши сотрудники</h1>
            <p>Каждый из нас хорошо знает как делать свое дело</p>
        </div>
    </div>
</div>
<div class="container">
    @foreach ($categories as $category)
        <div class="row marginTopBottomNm">
            <h3 id="{{$category->alias}}">{{$category->name}}</h3>
            @foreach ($category->items as $employee)
                <div class="col-sm-4 employee">
                    <div class="col-md-6 avatar">
                        <img src="{{$employee->getAvatar()}}" width="174">
                    </div>
                    <div class="col-md-6 employeeDetails">
                        <h4>{{$employee->getName()}}</h4>
                        <h5>{{$employee->position->getName()}}</h5>
                        <p>
                            @foreach ($employee->getSpecialities() as $speciality)
                                {{$speciality->details->getName()}}
                            @endforeach
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>


@endsection
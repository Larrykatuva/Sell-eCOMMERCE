@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/profile" class="card-link"><i class="fa fa-chevron-left mr-2 mb-3" aria-hidden="true"></i>Back</a>
        <div id="card1">
            <div id="a-title">
                <h3 class="text-center">{{$user->name}} Profile</h3>
            </div>
            <div id="a-info">
                @include('inc.messages')
                {!! Form::open(['action' => 'ProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('phone', 'Phone Number')}}
                        {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Enter your phone number'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('id', 'National ID')}}
                        {{Form::text('id', '', ['class' => 'form-control', 'placeholder' => 'Enter your nationa ID'])}}
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            {{ Form::label('Gender') }}
                            {{ Form::select('gender', ['1'=>'Male', '2'=>'Female', '3'=>'Others'], null, array('class'=>'form-control', 'placeholder'=>'Select Gender')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
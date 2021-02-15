@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/profile" class="card-link"><i class="fa fa-chevron-left mr-2 mb-3" aria-hidden="true"></i>Back</a>
        <div id="card1">
            <div id="a-title">
                <h3 class="text-center">Post a new product</h3>
            </div>
            <div id="a-info">
                @include('inc.messages')
                {!! Form::open(['action' => 'ProductController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('name', 'Product Name')}}
                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter product name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('price', 'Product Price')}}
                                {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Enter product price'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('quantity', 'Product Quantity')}}
                                {{Form::text('quantity', '', ['class' => 'form-control', 'placeholder' => 'Enter product quantity'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('brand', 'Product Brand')}}
                                {{Form::text('brand', '', ['class' => 'form-control', 'placeholder' => 'Enter product brand'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('location', 'Product Location')}}
                                {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Enter product location'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('category') }}
                                {{ Form::select('category', ['Electronics'=>'Electronics', 'Fashion'=>'Fashion', 'Others'=>'Others'], null, array('class'=>'form-control', 'placeholder'=>'Select Gender')) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('description', 'Product Desciption')}}
                                {{Form::textarea('desc', '', ['class' => 'form-control', 'placeholder' => 'Enter product description'])}}
                            </div>
                            <div class="form-group">
                                {{Form::file('cover_image')}}
                            </div>
                            {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>    
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
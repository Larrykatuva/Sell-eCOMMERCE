@extends('layouts.app')

@section('content')
    @include('inc.messages')
    <div id="header">
        <div id="header-col-3">
            <img style="width: 300px;" id="image1" src="{{asset('images/man.png')}}" alt="">
        </div>
        <div id="header-col-6">
            <p>Find anything in 
                <span id="dark">
                    <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>
                    All Kenya</span>
                </p>
                {!! Form::open(['action' => 'SearchController@search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'form-inline', 'id' => 'header-form']) !!}
                    <div class="form-group">
                        {{Form::text('item', '', ['class' => 'form-control', 'placeholder' => 'Search Item', 'id' => 'header-form-input'])}}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Search', ['class' => 'btn mb-2','id'=>'header-form-btn']) !!}
                    </div>
                {!! Form::close() !!}
        </div>
        <div id="header-col-3">
            <img id="image2" src="{{asset('images/girls.png')}}" alt="">
        </div>
    </div>
    <div id="section1">
        <div id="similar">
            @if (count($products) > 0)
                @foreach ($products as $product)
                <a style="text-decoration: none; color: grey;" href="/product/{{$product->id}}">
                    <div id="card1" class="mb-2">
                        <div id="row">
                            <div id="similar-col-1">
                                <img src="/storage/product_images/{{$product->cover_image}}" alt="">
                            </div>
                            <div id="similar-col-2">
                                <h5>{{ \Illuminate\Support\Str::limit($product->name, 40, $end='...') }} <span class="float-right text-success">Ksh {{$product->price}}</span></h5>
                                <a href="#" class="card-link">Automatic and power steering</a>
                                <a href="" class="mt-3 btn btn-success btn-block btn-sm">Place bid</a>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>
    
@endsection
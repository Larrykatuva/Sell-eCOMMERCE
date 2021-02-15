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
                {!! Form::open(['action' => 'SearchController@search', 'method' => 'POST', 'class' => 'form-inline', 'id' => 'header-form']) !!}
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
    <div id="mobile">
        <div id="row">
            <div id="m-col-3">
                <a href="/products/search/vehicle">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/car.png')}}" alt="">
                        <p>Vehicle</p>
                    </div>
                </a>
            </div>
            <div id="m-col-3">
                <a href="/products/search/property">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/house.png')}}" alt="">
                        <p>Property</p>
                    </div>
                </a>
            </div>
            <div id="m-col-3">
                <a href="/products/search/phone">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/phone.jpg')}}" alt="">
                        <p>Mobile Phones & Tablets</p>
                    </div>
                </a>
            </div>
            </div>
        </div>
        <div style="margin-top: -58px" id="row">
            <div id="m-col-3">
                <a href="/products/search/electronics">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/stv.png')}}" alt="">
                        <p>Electronics</p>
                    </div>
                </a>
            </div>
            <div id="m-col-3">
                <a href="/products/search/furnture">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/coach.png')}}" alt="">
                        <p>Home funture & Appli..</p>
                    </div>
                </a>
            </div>
            <div id="m-col-3">
                <a href="/products/search/beauty">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/beauty.png')}}" alt="">
                        <p>Health & Beauty</p>
                    </div>
                </a>
            </div>
            </div>
        </div>
        <div id="row" style="margin-top: -78px; margin-bottom: -44px">
            <div id="m-col-3">
                <a href="/products/search/computer">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/mac.jpg')}}" alt="">
                        <p>Laptops and Computers</p>
                    </div>
                </a>
            </div>
            <div id="m-col-3">
                <a href="/products/search/fashion">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/fashion.jpg')}}" alt="">
                        <p>Fashion</p>
                    </div>
                </a>
            </div>
            <div id="m-col-3">
                <a href="/products/search/sports">
                    <div id="card1" class="text-center">
                        <img src="{{asset('images/gym.jpg')}}" alt="">
                        <p>Sports, Arts & Outdoors</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="section1">
        <div id="col-3">
            <div id="card">
                <div id="menu">
                    <p><img src="{{asset('images/car.png')}}" alt=""> Vehicles <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/house.png')}}" alt=""> Property <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/phone.jpg')}}" alt=""> Mobile phones & Tablets <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/laptop.jpg')}}" alt=""> Electronics <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/coach.png')}}" alt=""> Home funture & Appliances <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/beauty.png')}}" alt=""> Health & Beauty <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/fashion.jpg')}}" alt=""> Fashion <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/gym.jpg')}}" alt=""> Sports, Arts & Outdoors <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                    <p><img src="{{asset('images/repair.jpg')}}" alt=""> Repairs & Construction <span class="float-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span></p>
                </div>
            </div>
        </div>
        <div id="col-7">
            <h3>Trending Ads</h3>
            @if (count($products) > 0)
                <div id="row">
                    @foreach ($products as $product)
                    <div id="col-4">
                        <a id="product-link" href="/product/{{$product->id}}">
                            <div id="card">
                                <img src="storage/product_images/{{$product->cover_image}}" alt="" id="p-img">
                                <p id="love"><i id="icon" class="fa fa-heart-o float-right mr-3" aria-hidden="true"></i></p>
                                <p id="p-name">{{ \Illuminate\Support\Str::limit($product->name, 30, $end='...') }}
                                </p>
                                <p id="p-seller">{{$product->user->name}}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    
@endsection
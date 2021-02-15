@extends('layouts.app')

@section('content')
    <div id="small-container">
        <div id="row">
            @if ($product)
                <div id="i-col-7">
                    <div id="card1">
                        <img src="/storage/product_images/{{$product->cover_image}}" alt="">
                        <div id="row">
                            <div id="item-col-4">
                                <img src="{{asset('images/note.jpg')}}" alt="">
                            </div>
                            <div id="item-col-4">
                                <img src="{{asset('images/note.jpg')}}" alt="">
                            </div>
                            <div id="item-col-4">
                                <img src="{{asset('images/note.jpg')}}" alt="">
                            </div>
                            <div id="item-col-4">
                                <img src="{{asset('images/note.jpg')}}" alt="">
                            </div>
                            <div id="item-col-4">
                                <img src="{{asset('images/note.jpg')}}" alt="">
                            </div>
                        </div>
                        <div id="p-info">
                            <h3>{{$product->name}}</h3>
                            <div id="p-info-div">
                                <p><i class="fa fa-map-marker mr-2" aria-hidden="true">
                                    </i>{{$product->location}}<span class="float-right">{{$product->views}} views
                                        <i class="fa fa-eye ml-2" aria-hidden="true"></i></span></p>
                            </div>
                            <hr>
                            <div id="desc">
                                <h4>Condition</h4>
                                <p>Refurbished</p>
                            </div>
                            <hr>
                            <div id="desc">
                                <h4>Description</h4>
                                <p>
                                    {{$product->desc}}
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="i-col-3">
                    <div id="card1">
                        <div id="p-header">
                            <h3>{{$product->price}}</h3>
                        </div>
                        <div id="p-seller">
                            <img src="/storage/profile_images/{{$product->User->userProfile->profile_image}}" alt="">
                            <h3>{{$product->User->name}}</h3>
                            {!! Form::open(['action' => 'BidController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{Form::hidden('id', $product->id, ['class' => 'form-control', 'placeholder' => 'Enter your nationa ID'])}}
                                {!! Form::submit('Place Bid', ['class' => 'btn btn-block','id'=>'leave_comment']) !!}
                            {!! Form::close() !!}
                            <hr>
                            <a href="" id="special-a" class="btn  btn-success btn-block"><i class="fa fa-phone mr-1" aria-hidden="true"></i> Contact Seller</a>
                            <a href="" class="btn btn-outline-success btn-block"><i class="fa fa-comments-o mr-1" aria-hidden="true"></i>Chat</a>
                            <br>
                        </div>
                    </div>
                    <div id="card1">
                        <div id="collection">
                            <h3>Collection Information</h3>
                            <hr>
                            <p><i class="fa fa-map-marker mr-2" aria-hidden="true">
                            </i>{{$product->location}}</p>
                            <p id="caution"><i class="fa fa-exclamation" aria-hidden="true"></i>
                            Please make sure the place of meeting is safe</p>
                        </div>
                    </div>
                </div>
                <div id="i-col-7">
                    <div id="similar">
                        @if (count($product->site->products))
                            @foreach ($product->site->products as $product)
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
            @endif
        </div>
    </div>
@endsection
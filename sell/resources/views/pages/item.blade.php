@extends('layouts.app')

@section('content')
    <div id="small-container">
        <div id="row">
            <div id="i-col-7">
                <div id="card1">
                    <img src="{{asset('images/h1.jpg')}}" alt="">
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
                        <h3>Toyoto Harrier 2010 model</h3>
                        <div id="p-info-div">
                            <p><i class="fa fa-map-marker mr-2" aria-hidden="true">
                                </i>Nairobi Central, Nairobi, Kenya<span class="float-right">240 views
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
                                AMPEX - 3.1 Channel SUB WOOFER - 40000W,You definitely 
                                want to have this elegant and poised home entertainment speaker 
                                unit in your living room. Specially designed for the music lovers,
                                 this Speaker system was made to impress with a high sound 
                                 quality that will ensure you enjoy the good music that
                                  you love listening to. When it comes to sound, sometimes
                                   it is good to get a machine specifically geared to that function
                                    and features such as FM Tuner with inbuilt memory to store your favorite 
                                    channels, Bluetooth, USB port make it an ideal System to have. 
                                    This device is meant to amplify every octave and quartet, 
                                    a system that brings meaning and feeling to music. You can easily 
                                connect it to the TV, DVD player or even your smartphone
                                 for all of your favorite tunes.
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
                <div id="similar">
                    <div id="card1">
                        <div id="row">
                            <div id="similar-col-1">
                                <img src="{{asset('images/note.jpg')}}" alt="">
                            </div>
                            <div id="similar-col-2">
                                <h5>Toyota note 2010 model <span class="float-right text-success">Ksh 430000</span></h5>
                                <a href="#" class="card-link">Automatic and power steering</a>
                                <a href="" class="mt-3 btn btn-success btn-block btn-sm">Place bid</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="i-col-3">
                <div id="card1">
                    <div id="p-header">
                        <h3>Ksh 1499999</h3>
                    </div>
                    <div id="p-seller">
                        <img src="{{asset('images/note.jpg')}}" alt="">
                        <h3>Sammy Mbote</h3>
                        <a href="" class="btn btn-success btn-block">Place Bid</a>
                        <hr>
                        <a href="" id="special-a" class="btn btn-success btn-block"><i class="fa fa-phone mr-1" aria-hidden="true"></i> Contact Seller</a>
                        <br>
                    </div>
                </div>
                <div id="card1">
                    <div id="collection">
                        <h3>Collection Information</h3>
                        <hr>
                        <p><i class="fa fa-map-marker mr-2" aria-hidden="true">
                        </i>Nairobi Central, Nairobi, Kenya</p>
                        <p id="caution"><i class="fa fa-exclamation" aria-hidden="true"></i>
                        Please make sure the place of meeting is safe</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div id="messages">
        <div id="row">
            <div id="ms-col-3">
                <div id="card">
                    <h4 class="float-center" id="ms-title">My messages</h4>
                    <hr>
                    <div id="chats">
                        <div id="row">
                            <div id="chat-col-3">
                                <img src="{{asset('storage/test/profile.png')}}" alt="">
                            </div>
                            <div id="chat-col-7">
                                <h5>Lawrence katuva</h5>
                                <p>the product is currently goi...</p>
                            </div>
                        </div>
                    </div>
                    <div id="chats">
                        <div id="row">
                            <div id="chat-col-3">
                                <img src="{{asset('storage/test/profile.png')}}" alt="">
                            </div>
                            <div id="chat-col-7">
                                <h5>Lawrence katuva</h5>
                                <p>the product is currently goi...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ms-col-9">
                <div id="ms-nav"></div>
                <div class="container1">
                    <div class="message-blue">
                        <p class="message-content">This is an awesome message!</p>
                        <div class="message-timestamp-left">SMS 13:37</div>
                    </div>
                    
                    <div class="message-orange">
                        <p class="message-content">I agree that your message is awesome!</p>
                        <div class="message-timestamp-right">SMS 13:37</div>
                    </div>
                    
                    <div class="message-blue">
                        <p class="message-content">Thanks!</p>
                        <div class="message-timestamp-left">SMS 13:37</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
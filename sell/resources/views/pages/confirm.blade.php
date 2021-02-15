@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="card1">
            <div id="confirm">
                <h3 class="card-title text-center">Confirmation details</h3>
                <hr>
                <div id="row">
                    <div id="col-6">
                        <h3>Product details</h3>
                        <p>Product name</p>
                        <p>Product condition</p>
                        <p>product price</p>
                    </div>
                    <div class="b" id="col-6">
                        <h3>Address Location</h3>
                        <p>product seller location</p>
                        <p>pickup date</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
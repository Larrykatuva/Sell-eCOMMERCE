@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="card1">
            <div id="note-info">
                <h4 class="text-center">Notifications</h4>
                @if (count($notes) > 0)
                    @foreach($notes as $note)
                        <hr>
                        <div class=" p-3" style="background: rgba(76, 175, 80, 0.1); border-radius: 5px;">
                            <h5 class="text-bold">About: Bid <span class="float-right"><a href="" class="btn btn-success btn-sm"><i class="fa fa-eye mr-1" aria-hidden="true"></i>Mark as read</a></span></h5>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($note->message, 100, $end='...') }}</p>
                        </div>
                    @endforeach
                @else
                    <hr>
                    <p class="text-center">No Notifications available</p>
                @endif
            </div>
        </div>
    </div>
@endsection
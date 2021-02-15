@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($bid)
            <p>{{$bid->name}}</p>
            
        @endif
    </div>
@endsection
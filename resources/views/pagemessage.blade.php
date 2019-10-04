@extends('layouts.app')

@section('content')

<div class="container" style="border:3px solid #C3F4EE; padding:7px;">
                <h3>Boite de message :</h3>
                <hr>
                @foreach($messages as $message)
                <a href="#" style="float:right;">{{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</a>
    <p style="color:black">{{ $message->content }} </p> Envoyé par : <a href="#">{{ getBuyerName($message->id_buyer) }}</a><br><br>
    <p style="color:gray;">à : {{ $message->created_at }}</p>
    <hr>
    @endforeach
                </div>


@endsection



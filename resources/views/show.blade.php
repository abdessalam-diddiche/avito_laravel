@extends('layouts.app')

@section('content')


<div id="logo" style="margin-top:50px; width:300px; height:220px; margin-left:100px;">
<a href="{{ url('acceuil') }}"><img src="{{ asset ('images/logo.png') }}" width="85%"></a>
</div>



<div class="container" style="border:2px solid gray; background-color:#F5F5F5">
<div class="row">
<div class="col-md-12">
<h1>My Ads :</h1>

<div class="pull-right">
<a href="{{ url('announces') }}" class="btn btn-warning" style="float:right">Nouveau Annonce</a>
</div>
<hr>

<div class="row">

<div class="col-md-4">
<img src="{{ asset('storage/'.$announces->image1) }}" width="100%" heigth="130px" style="margin:10px">
<img src="{{ asset('storage/'.$announces->image2) }}" width="100%" heigth="130px" style="margin:10px">
</div>

    <div class="col-md-8">
        <small>{{ Carbon\Carbon::parse($announces->created_at)->diffForHumans() }}</small>
       
        <h3>{{ $announces->title }}</h3>
        <p>{{ $announces->description }}</p>
        <p>{{ $announces->price }}</p>
        
        <hr>
        
        <h5>{{ $announces->name_category }}</h5>
        <h6>{{ $announces->name_city }}</h6>
        <small>{{ $announces->created_at }}</small>

    
    </div>
    

    </div>
    

    


</div>
</div>



<br>
<br>
<br>
<br>
<br>



@endsection

@extends('layouts.app')

@section('content')

<div class="container">
@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif

<h1>Contacter le vendeur</h1>
<form action="{{ route('message.store') }}" method="POST">
@csrf
<div class="form-group">
<label for="content">Votre message :</label>
<textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>

</div>
<input type="hidden" name="id_seller" value="{{ $id_seller }}">
<input type="hidden" name="id_annonce" value="{{ $id_annonce }}">
<input type="hidden" name="id_buyer" value="{{ auth()->user()->id }}">

<button type="submit" class="btn btn-success">Envoyer le message</button>
</form>
</div>







@endsection
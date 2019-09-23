@extends('layouts.app')

@section('content')

<div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>


<div class="container-fluid">
<div class="row">
<div class="col-md-12">

@if(session()->has('supprimer'))
<div class="alert alert-success">
{{ session()->get('supprimer') }}
</div>
@endif

@if(session()->has('editer'))
<div class="alert alert-success">
{{ session()->get('editer') }}
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif

<h1>La liste de mes annonces :</h1>

<div class="pull-right">
<a href="{{ url('announces') }}" class="btn btn-warning" style="float:right">Nouveau Annonce</a>
</div>

<table class="table" style="background-color:#F5F5DC">

<thead class="thead-dark">
    <tr style="color:withe">
        <th>Category</th>
        <th>City</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    </thead>

    <body>
    @foreach($announces as $annonce)
    <tr>
        <td>{{ $annonce->name_category }}</td>
        <td>{{ $annonce->name_city }}</td>
        <td>{{ $annonce->title }}</td>
        <td>{{ $annonce->description }}</td>
        <td>{{ $annonce->price }}</td>
        <td>{{ $annonce->created_at }}</td>

        <td>
        
        <a href="/show/{{$annonce->id}}" class="btn btn-primary">Détail</a>
        <a href="{{ url('announces/'.$annonce->id.'/edit') }}" class="btn btn-success">Editer</a>

        <form action="/announces/{{$annonce->id}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Supprimer</button>
    
        
        </form>
        </td>
    </tr>
    @endforeach

</table>

</div>
</div>
</div>


<br>
<br>
<br>
<br>
<br>



@endsection



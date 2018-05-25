@extends('layouts.app')
@section('content')

<h1>Détail du projet</h1>
<h3>Nom du projet : {{$description->projectName}}</h3>
<h3>Porteur du projet : {{$detail->name}} et son id : {{$detail->id}}</h3>
<h3>Détail du projet : {{$description->descriptive}}</h3>

<a href="/modification/{{$description->id}}">
    <button type="button" class='btn btn-danger'>Modifier</button>
</a>

<a href="/">
    <button type="button" class="btn btn-primary">Menu</button>
</a>

<a href="/formulaire_projet">
    <button type="button" class="btn btn-success">Créer un projet</button>
</a>
@endsection
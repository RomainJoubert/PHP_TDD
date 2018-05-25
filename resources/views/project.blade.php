@extends('layouts.app')
@section('content')
<h1>Liste des projets</h1>
@foreach($projets as $projet)
    <table>
        <tr><a href="/project/{{$projet->id}}">{{$projet->projectName}}</a>
        </tr>
    </table>
@endforeach
<br><br>
<div>
    <a href="/">
        <button type="button" class="btn btn-primary">Menu</button>
    </a>

    <a href="/formulaire_projet">
        <button type="button" class="btn btn-success">Créer un projet</button>
    </a>
</div>
<img src="img/solidarite2.jpg">
@endsection
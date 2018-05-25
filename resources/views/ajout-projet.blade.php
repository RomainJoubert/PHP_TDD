@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Bonjour <b>{{Auth::user()->name}}</b></h3>
    <hr>
    <form class="" action="/project" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="projectName">Nom du Projet</label>
            <input type="text" class="form-control" name="projectName" placeholder="Entrez le titre de votre projet">
        </div>
        <div class="form-group">
            <label for="descriptive">Descriptif</label>
            <input type="text" class="form-control" name="descriptive"
                   placeholder="Expliquer en quoi consiste votre projet">
        </div>
        <div class="form-group">
            <label for="name">Nom de l'auteur :  {{Auth::user()->name}} </label>
        </div>

        <button type="submit" class="btn btn-success">Validez votre projet</button>
        <hr>
        <a href="/project">
            <button type="button" class="btn btn-info">Annuler</button>
        </a>
    </form>
    <img src="/img/vacances.jpg">
</div>
@endsection



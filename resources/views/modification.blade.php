@extends('layouts.app')
@section('content')
<div class="container">
    <h3>Bonjour <b>{{Auth::user()->name}}</b></h3>
    <hr>
    @if (Auth::user()->id == $project->user_id)
    <form class="" action="/project/{{$project->id}}" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="form-group">
            <label for="projectName">Nom du Projet : </label>
            <input type="text" class="form-control" name="newProjectName" value="{{$project->projectName}}">

        </div>
        <div class="form-group">
            <label for="descriptive">Descriptif</label>
            <input type="text" class="form-control" name="newDescriptive"
                   value="{{$project->descriptive}}">
        </div>
        <div class="form-group">
            <label for="name">Nom de l'auteur : {{Auth::user()->name}} </label>
        </div>

        <button type="submit" class="btn btn-success">Validez vos changements</button>
        <hr>
        <a href="/project">
            <button type="button" class="btn btn-info">Annuler</button>
        </a>
    </form>
    @else
       <div>
        <h1>Vous n'êtes pas l'auteur du projet, vous ne pouvez pas le modifier</h1>
        <a href="/project">
            <button type="button" class="btn btn-info">Retourner à la liste des projets</button>
        </a>
           <br>
           <br>
           <br>
       </div>
    @endif
    <img src="/img/vacances.jpg">
</div>
@endsection
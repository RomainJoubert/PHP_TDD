<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Projet</title>
</head>
<body>
{{--Created by PhpStorm.--}}
{{--User: romain.joubert--}}
{{--Date: 17/05/2018--}}
{{--Time: 11:20--}}
<h1>Liste des projets</h1>
@foreach($projets as $projet)
    <table>
        <tr><a href="/project/{{$projet->id}}">{{$projet->projectName}}</a></tr>

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
</body>
</html>
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
<h1>Détail du projet</h1>
<h3>Nom du projet : {{$description->projectName}}</h3>
<h3>Porteur du projet : {{$detail->name}} et son id : {{$detail->id}}</h3>

    <table>
        <tr>{{$description->descriptive}}</tr>
    </table>

<a href="/">
    <button type="button" class="btn btn-primary">Menu</button>
</a>

<a href="/formulaire_projet">
    <button type="button" class="btn btn-success">Créer un projet</button>
</a>
</body>
</html>
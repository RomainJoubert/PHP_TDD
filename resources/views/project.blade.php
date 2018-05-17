<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet</title>
</head>
<body>
{{--Created by PhpStorm.--}}
{{--User: romain.joubert--}}
{{--Date: 17/05/2018--}}
{{--Time: 11:20--}}
<h1>Liste des projets</h1>
@foreach($projets as $projet)
    <ul>
        <li>{{$projet->projectName}}</li>
    </ul>
    @endforeach

</body>
</html>
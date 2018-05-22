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
<h1>Détail du projet</h1>
<h3>Nom du projet : {{$description->projectName}}</h3>
<h3>Porteur du projet : {{$detail->name}}</h3>

    <table>
        <tr>{{$description->descriptive}}</tr>
    </table>


</body>
</html>
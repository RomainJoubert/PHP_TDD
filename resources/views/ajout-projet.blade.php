<!<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Création projet</title>
</head>
<body>

<div class="container">
    <h3>Bonjour <b>{{Auth::user()->name}}</b></h3>
    <hr>
    <form class="" action="/project" method="get">
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
</body>
</html>



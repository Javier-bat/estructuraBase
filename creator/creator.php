<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creador</title>
    <link rel="stylesheet" href="creator/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SuperMegaHiperDuperSuper</a>
</nav>

<div class="container pt-5">
    <div class="row">
        <div class="col">
            <div class="alert alert-primary text-center" role="alert">
                Este archivo sirve para crear un modelo junto a un controlador ABM básico de manera intuitiva
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Nombre del modelo</b></label>
                <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Nombre de la clave primaria</b></label>
                <input type="text" class="form-control" id="primaryKey" name="primaryKey" aria-describedby="emailHelp">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Parámetros del modelo(Separados por coma)</b></label>
                <textarea class="form-control" id="atributos" name="atributos" rows="3"></textarea>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col"></div>
        <div class="col">
            <button type="button" class="btn btn-primary">Generar</button>
        </div>
        <div class="col"></div>
    </div>
</div>

<script src="creator/js/jquery.js"></script>
<script src="creator/js/bootstrap.min.js"></script>
</body>
</html>
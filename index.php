<?php
    require 'config.php';
    require 'classes/carros.class.php';
    require 'classes/reservas.class.php';

    $reservas = new Reservas($pdo);// criando uma class e inserindo a conexão dentro dela
    $carros = new Carros($pdo);// criando uma class e inserindo a conexão dentro dela
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Reservas</title>
</head>
<body>
    <div class="container mt-5">
    <h1>Reservas</h1>
    </div>
</body>
</html>
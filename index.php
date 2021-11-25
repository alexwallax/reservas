<?php
    require 'config.php';
    require 'classes/reservas.class.php';


    $reservas = new Reservas($pdo);// criando uma class e inserindo a conexão dentro dela
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
        
        <h1>Reservas</h1><br/>

        <a class="btn btn-primary" href="reservar.php">Adicionar Reserva</a>
        <br/><br/>

        <form method="GET">
            <select name="ano">
                <option></option>
            </select>
        </form>

        <?php 

            $lista = $reservas->getReservas();

            foreach($lista as $item) {
                $data1 = date('d/m/Y', strtotime($item['data_inicio']));
                $data2 = date('d/m/Y', strtotime($item['data_fim']));
                echo $item['pessoa'].' reservou o carro '.$item['id_carros'].' entre '.$data1.' e '.$data2.'<br/>';
            } 
            
        ?>
        
        <hr>

        <?php
            require 'calendario.php';
        ?>
    </div>

</body>
</html>
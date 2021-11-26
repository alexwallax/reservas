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
        
        <h1>Reservas</h1>

        <a class="btn btn-primary" href="reservar.php">Adicionar Reserva</a>
        <br/><br/>

        <form method="GET">

            <select name="ano">
                <?php for($q=date('Y');$q>=2000;$q--): ?>
                    <option><?php echo $q; ?></option>
                <?php endfor; ?> 
            </select><!--seleciona o ano-->

            <select name="mes">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
            </select><!--seleciona o mes-->

            <input class="btn btn-outline-primary btn-sm" type="submit" value="Mostrar"/>

        </form>

        <?php 
            if(empty($_GET['ano'])) {
                exit;
            }

            $data = $_GET['ano'].'-'.$_GET['mes'];
            $dia1 = date('w', strtotime($data));//01 é o dia do mes (vai ser impresso em que dia 01/01/2017) no caso 0 zero(domingo) 
            $dias = date('t', strtotime($data));//para saber quantos dias tem no mes especifico
            $linhas = ceil(($dia1+$dias) / 7);
            $dia1 = -$dia1;
            $data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));//pegar o primeiro dia do calendario
            $data_fim = date('Y-m-d', strtotime(( ($dia1 + ($linhas*7) - 1) ).' days', strtotime($data)));//pegar o ultimo dia do calendario

            $lista = $reservas->getReservas($data_inicio, $data_fim);

            //mostra a lista na tela
            /*
            foreach($lista as $item) {
                $data1 = date('d/m/Y', strtotime($item['data_inicio']));
                $data2 = date('d/m/Y', strtotime($item['data_fim']));
                echo $item['pessoa'].' reservou o carro '.$item['id_carros'].' entre '.$data1.' e '.$data2.'<br/>';
            } 
            */


            
        ?>
        
        <hr>

        <?php
            require 'calendario.php';
        ?>
    </div>

</body>
</html>
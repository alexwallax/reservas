<?php
     
    $data = '2017-01'; //ano 2017 e mes 01 janeiro
    $dia1 = date('w', strtotime($data)); //01 é o dia do mes (vai ser impresso em que dia 01/01/2017) no caso 0 zero(domingo) 
    $dias = date('t', strtotime($data));//para saber quantos dias tem no mes especifico
    $linhas = ceil(($dia1 + $dias) / 7);
    $dia1 = -$dia1;
    $data_inicio = date('Y-m-d', strtotime($dia1.' days', strtotime($data)));//pegar o primeiro dia do calendario
    $data_fim = date('Y-m-d', strtotime(( ($dia1 + ($linhas * 7) - 1) ).' days', strtotime($data)));//pegar o ultimo dia do calendario


    echo "Primerio dia: ".$dia1."<br/>"; //no caso '0 zero' é o domingo '1 um' é segunda '2 dois' é treça ...
    echo "Total Dias: ".$dias."<br/>";// mostrar a quantidade de dias que tem no mes
    echo "Linhas: ".$linhas."<br/>";
    echo "Data Início: ".$data_inicio."<br/>";
    echo "Data Fim: ".$data_fim."<br/><hr>";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Calendario</title>
</head>
<body>

    <div class="mt-5 container">
        
        <table border="1" width="100%">

            <tr><!--1º linha mostrando os dias da semana-->
                <th>Dom</th>
                <th>Seg</th>
                <th>Ter</th>
                <th>Qua</th>
                <th>Qui</th>
                <th>Sex</th>
                <th>Sab</th>
            </tr>

            <?php for($l = 0; $l < $linhas; $l++): ?>

                <tr>

                    <?php for($q = 0; $q < 7; $q++): ?>

                    <?php 
                        $w = date('d', strtotime(($q + ($l * 7)).' days', strtotime($data_inicio)) );
                       // $w = date('d/m/Y', strtotime(($q + ($l * 7)).' days', strtotime($data_inicio)) ); //exibir data completa
                    ?>
                    <td><?php echo $w; ?></td>

                    <?php endfor; ?>

                </tr>

            <?php endfor; ?>

        </table>

    </div>

</body>
</html>

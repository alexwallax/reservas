
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
                    <?php for($q=0;$q<7;$q++): ?>
                    <?php
                        $t = strtotime(($q+($l*7)).' days', strtotime($data_inicio));
                        $w = date('Y-m-d', $t);
                    ?>
                    <td>
                    <?php
                        echo date('d/m', $t)."<br/><br/>";
                        $w = strtotime($w);
                        foreach($lista as $item) {
                            $dr_inicio = strtotime($item['data_inicio']);
                            $dr_fim = strtotime($item['data_fim']);

                            if( $w >= $dr_inicio && $w <= $dr_fim ) {
                                echo $item['pessoa']." (".$item['id_carro'].")<br/>";
                            }

                        }
                    ?>
                    </td>
                    <?php endfor; ?>
		        </tr>
            <?php endfor; ?>

        </table>

    </div>

</body>
</html>

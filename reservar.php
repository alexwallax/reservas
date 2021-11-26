<?php
    require 'config.php'; //conexão com banco
    require 'classes/carros.class.php'; //buscando a classe carros
    require 'classes/reservas.class.php'; //buscando a classe reservas

    $reservas = new Reservas($pdo);// criando uma class e inserindo a conexão dentro dela
    $carros = new Carros($pdo);// criando uma class e inserindo a conexão dentro dela

    if(!empty($_POST['carro'])) {
        $carro = addslashes($_POST['carro']);
        $data_inicio = explode('/', addslashes($_POST['data_inicio']));//explode tranforma em um array
        $data_fim = explode('/', addslashes($_POST['data_fim']));//explode tranforma em um array
        $pessoa = addslashes($_POST['pessoa']);

        $data_inicio = $data_inicio[2].'-'.$data_inicio[1].'-'.$data_inicio[0];//transformar padrão brasileiro
        $data_fim = $data_fim[2].'-'.$data_fim[1].'-'.$data_fim[0];//transformar padrão brasileiro

        if($reservas->verificarDisponibilidade($carro, $data_inicio, $data_fim)) {
            $reservas->reservar($carro, $data_inicio, $data_fim, $pessoa);
            header("Location: index.php");
            exit;
        } else {
            echo "Este carro já está reservado neste período.";
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Reservar</title>
</head>
<body>
    <div class="mt-5 container">

        <h1>Adicionar Reserva</h1>

        <form method="POST">
            
	        Carro:<br/>

        <select name="carro">
            <?php
            $lista = $carros->getCarros();

            foreach($lista as $carro):
                ?>
                <option value="<?php echo $carro['id']; ?>"><?php echo $carro['nome']; ?></option>
                <?php
            endforeach;
            ?>
        </select><br/><br/>

        Data de início:<br/>
        <input type="text" name="data_inicio" /><br/><br/>

        Data de fim:<br/>
        <input type="text" name="data_fim" /><br/><br/>

        Nome da pessoa:<br/>
        <input type="text" name="pessoa" /><br/><br/>

        <input type="submit" value="Reservar" />
        
    </form>

    </div>
</body>
</html>

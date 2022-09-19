<?php
    require_once('app/Controllers/ControllerVotos.php');

    $usuarioDao = new ControllerVotos();
    $usuarioDao->readVotos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <?php if($usuarioDao->readVotos()) {?>
        <div class="container">
            <h1>Votos</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Idade</th>
                        <th>Candidato</th>
                        <th>Data Registro</th>
                        <th>Total Bill Gates</th>
                        <th>Total Mark Zuckerberg</th>
                    </tr>
                </thead>
                <tbody >
                    <?php foreach($usuarioDao->readVotos() as $votos){?>
                        <tr>
                            <td> <?php echo $votos["nome"] ?> </td>
                            <td> <?php echo $votos["cpf"] ?> </td>
                            <td> <?php echo $votos["idade"] ?> </td>
                            <td> <?php echo $votos["candidato_nome"] ?> </td>
                            <td> <?php echo date('d/m/Y', strtotime($votos["data_registro"])) ?> </td>
                            <td> <?php echo $votos["total_b"] ?> </td>
                            <td> <?php echo $votos["total_m"] ?> </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    <?php }?>
</body>
</html>
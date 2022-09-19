<?php
    require_once('app/Models/Votos.php');
    require_once('app/Controllers/ControllerVotos.php');

    if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade']) && !empty($_POST['box_candidatos'])) {
    
        $votos = new Votos($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['box_candidatos']);
        
        $votos->validarVotos();

        if (empty($votos->erro)) {
            $usuarioDao = new ControllerVotos();
            $usuarioDao->createVotos($votos);
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eleições 2022</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5" style="background-color: var(--bs-teal);">
    <div class="container border border-2 rounded-4 p-4 bg-white" style="max-width: 500px;">
        <form method="POST">
            <h1 class="mb-4 text-center fw-bold">VOTAÇÃO</h1>
            <div class="row">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control form-control-lg bg-light" value="" required >
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control form-control-lg bg-light" value="" required>
                </div>

                <div class="mb-4">
                    <label for="idade" class="form-label">Idade</label>
                    <input type="number" name="idade" class="form-control form-control-lg bg-light" value="" required>
                </div>

                <div class="mb-2 col-sm-4">
                    <img src="images/bill.jpg" class="img-thumbnail" alt="Candidato Bill Gates">
                </div>

                <div class="mb-2 col-sm-8">
                    <div class=" form-check position-relative top-50 start-50 translate-middle">
                        <input class="form-check-input fs-4" type="radio" value="1" name="box_candidatos" required>
                        <label for="bill_radio" class="form-check-label fw-bold fs-4">Bill Gates</label>
                    </div>
                </div>

                <div class="mb-4 col-sm-4">
                    <img src="images/mark.jpg" class="img-thumbnail" alt="Candidato Mark Zuckerberg">
                </div>
                
                <div class="mb-3 col-sm-8">
                    <div class="form-check position-relative top-50 start-50 translate-middle">
                        <input class="form-check-input fs-4" type="radio" value="2" name="box_candidatos" required>
                        <label for="mark_radio" class="form-check-label fw-bold fs-4">Mark Zuckerberg</label>
                    </div>
                </div>
            </div>
            <div class="d-grid mb-3">
                <input type="submit" value="VOTAR" class="btn btn-lg text-light" style="background-color: var(--bs-teal);">
            </div>

            <?php if(isset($usuarioDao)) {?>
                <div class="alert text-center fs-4 alert-success" role="alert">
                    <span class="d-block fw-bold">Votação realizada com sucesso!</span>
                </div>
            <?php } elseif(isset($votos) && !empty($votos->erro)) {?>
                <div class="alert text-center fs-4 alert-danger" role="alert">
                    <span class="d-block fw-bold"> <?php echo $votos->erro?> </span>
                </div>
            <?php }?>
        </form>
    </div>
</body>

<script src="js/bootstrap.bundle.min.js"></script>

</html>
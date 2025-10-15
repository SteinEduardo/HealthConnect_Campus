<?php
    require_once __DIR__ . '/../../app/Controllers/sessao/cadastrar_prontuarioController.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Cadastrar Prontuário</title>
</head>
<body>

    <div class="container">
        <h1>Cadastrar Prontuário</h1>

        <?php if (isset($error)) { ?>
            <div class="alert"><?php echo $error; ?></div>
        <?php } ?>

        <form action="#" method="post">
            <input type="hidden" name="id_paciente" value="<?php echo $id_paciente; ?>">

            <div class="form-group">
                <label for="data_hora">Data e Hora:</label>
                <input type="datetime-local" id="data_hora" name="data_hora" required>
            </div>

            <div class="form-group">
                <label for="avaliacao">Avaliação:</label>
                <textarea id="avaliacao" name="avaliacao" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="historico_familiar">Histórico Familiar:</label>
                <textarea id="historico_familiar" name="historico_familiar" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="historico_social">Histórico Social:</label>
                <textarea id="historico_social" name="historico_social" rows="4" required></textarea>
            </div>

            <button type="submit" name="botao" value="Cadastrar">Cadastrar</button>
        </form>
    </div>

</body>
</html>

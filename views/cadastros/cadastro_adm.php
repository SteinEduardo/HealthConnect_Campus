<?php
    require_once __DIR__ . '/../../app/Controllers/cadastros/cadastro_admController.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <title>Cadastrar Administrador</title>
</head>
<body>

    <div class="container">
        <h1>Cadastrar Administrador</h1>

        <form action="#" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <div class="form-group">
                <label for="nivel">Nível:</label>
                <input type="text" id="nivel" name="nivel" required>
            </div>

            <button type="submit" name="botao" value="Cadastrar">Cadastrar</button>
        </form>
    </div>

</body>
</html>

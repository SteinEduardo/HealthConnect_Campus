<?php
    require_once __DIR__ . '/../../app/Controllers/cadastros/cadastro_alunoController.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <title>Cadastrar Aluno</title>
</head>
<body>

    <div class="container">
        <h1>Cadastrar Aluno</h1>

        <form action="#" method="post">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="number" id="cpf" name="cpf" required>
            </div>

            <div class="form-group">
                <label for="ra">RA:</label>
                <input type="number" id="ra" name="ra" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="number" id="telefone" name="telefone" required>
            </div>

            <div class="form-group">
                <label for="professor_email">Professor Responsável (Email):</label>
                <input type="email" id="professor_email" name="professor_email" required>
            </div>

            <button type="submit" name="botao" value="Cadastrar">Cadastrar</button>
        </form>
    </div>

</body>
</html>
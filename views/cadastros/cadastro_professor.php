<?php
    require_once __DIR__ . '/../../app/Controllers/cadastros/cadastro_professorController.php'
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Cadastrar Professor</title>
</head>

<body>
    <div class="container">
        <h1>Cadastrar Professor</h1>

        <form action="#" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="number" name="cpf" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="telefone">Telefone:</label>
            <input type="number" name="telefone" required>

            <label for="nivel">Nível:</label>
            <input type="text" name="nivel" required>

            <button type="submit" name="botao" value="Cadastrar">Cadastrar</button>
        </form>
    </div>
</body>
</html>

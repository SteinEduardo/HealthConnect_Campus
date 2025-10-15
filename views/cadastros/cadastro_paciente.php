<?php
    require_once __DIR__ . '/../../app/Controllers/cadastros/cadastro_pacienteController.php'
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Cadastrar Paciente</title>
</head>

<body>
    <div class="container">
        <h1>Cadastrar Paciente</h1>

        <form action="#" method="post">

            <label for="data_abertura">Data de Abertura:</label>
            <input type="date" name="data_abertura" required>

            <label for="nome">Nome Completo:</label>
            <input type="text" name="nome" required>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required>

            <label for="genero">Gênero:</label>
            <input type="text" name="genero" required>

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" required>

            <label for="telefone">Telefone:</label>
            <input type="number" name="telefone" required>

            <label for="email">Email:</label>
            <input type="email" name="email">

            <label for="contato_emergencia">Contato Emergencial:</label>
            <input type="number" name="contato_emergencia">

            <label for="escolaridade">Escolaridade:</label>
            <input type="text" name="escolaridade">

            <label for="ocupacao">Ocupação:</label>
            <input type="text" name="ocupacao">

            <label for="necessidade">Necessidade:</label>
            <input type="text" name="necessidade">

            <label for="estagiario">Aluno Responsável:</label>
            <input type="text" name="estagiario" required>

            <label for="orientador">Professor Supervisor:</label>
            <input type="text" name="orientador" required>

            <label for="ra">RA do Aluno Responsável:</label>
            <input type="number" name="ra" required>

            <button type="submit" name="botao" value="Cadastrar">Cadastrar</button>
        </form>
    </div>
</body>
</html>

<?php
    require_once __DIR__ . '/../../app/Controllers/menu/menu_alunoController.php'
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
</head>
<body>
    <div class="main-content">
        <h1>Bem-vindo</h1>
        <h2>Lista de Pacientes</h2>

        <table id="list-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Abertura</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($coluna = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><a href="prontuario.php?id=<?php echo $coluna['id']; ?>"><?php echo $coluna['nome']; ?></a></td>
                        <td><?php echo $coluna['data_abertura']; ?></td>
                        <td>
                            <button class="button" onclick="window.location.href='cadastrar_prontuario.php?id=<?php echo $coluna['id']; ?>'">
                                Cadastrar Prontuário
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <button class="button" onclick="window.location.href='cadastro_paciente.php'">
            Cadastrar Novo Paciente
        </button>
        <a class="logout-link" href="logout.php">Sair</a>
    </div>
</body>
</html>

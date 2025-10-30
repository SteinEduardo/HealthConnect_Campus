<?php
require_once __DIR__ . '/../../app/Controllers/menu/menu_professorController.php'
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <title>Lista de Alunos</title>
</head>

<body>
    <div class="main-content">
        <h1>Bem-vindo, Professor <?php echo $_SESSION['nome']; ?></h1>
        <h2>Lista de Alunos</h2>

        <table id="list-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>RA</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($coluna = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><a href="menu_aluno.php?aluno_id=<?php echo $coluna['id']; ?>"><?php echo $coluna['nome']; ?></a></td>
                        <td><?php echo $coluna['ra']; ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="excluir_aluno_id" value="<?php echo $coluna['id']; ?>">
                                <button class="button" type="submit" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <br>
        <div>
            <button class="button" onclick="window.location.href='../cadastros/cadastro_aluno.php'">Cadastrar Aluno</button>
            <button class="button" onclick="window.location.href='../cadastros/cadastro_paciente.php'">Cadastrar Paciente</button>
        </div>

        <a class="logout-link" href="logout.php">Sair</a>
    </div>
</body>

</html>
<?php
    require_once __DIR__ . '/../../app/Controllers/menu/menu_admController.php'
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu Administrador</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <h1>Menu Administrador</h1>

        <?php echo $status_message; ?>

        <form class="form-filtro" method="GET">
            <input type="text" name="filtro" placeholder="Filtrar por nome" value="<?php echo htmlspecialchars($filtro); ?>">
            <button type="submit">Filtrar</button>
        </form>

        <div class="btn-container">
            <button onclick="window.location.href='cadastro_professor.php'">Cadastrar Professor</button>
            <button onclick="window.location.href='cadastro_aluno.php'">Cadastrar Aluno</button>
            <button onclick="window.location.href='cadastro_paciente.php'">Cadastrar Paciente</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($coluna = mysqli_fetch_array($result)) { 
                    $link = '#';
                    if ($coluna['tipo'] === 'Aluno') {
                        $link = "menu_aluno.php?id=" . urlencode($coluna['id']);
                    } elseif ($coluna['tipo'] === 'Professor') {
                        $link = "menu_professor.php?id=" . urlencode($coluna['id']);
                    } elseif ($coluna['tipo'] === 'Paciente') {
                        $link = "prontuario.php?id=" . urlencode($coluna['id']);
                    }
                ?>
                    <tr>
                        <td><?php echo $coluna['tipo']; ?></td>
                        <td>
                            <a href="<?php echo $link; ?>"><?php echo $coluna['nome']; ?></a>
                        </td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="tipo" value="<?php echo $coluna['tipo']; ?>">
                                <input type="hidden" name="id" value="<?php echo $coluna['id']; ?>">
                                <button type="submit" class="delete-btn" onclick="return confirm('Tem certeza que deseja deletar este registro?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="logout.php" class="logout">Sair</a>
    </div>
</body>
</html>

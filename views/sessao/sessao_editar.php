<?php
    require_once __DIR__ . '/../../app/Controllers/sessao/sessao_editarController.php'
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Sessão</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <h1>Editar Sessão</h1>
        <form method="POST">
            <label for="data_horario">Data e Hora:</label>
            <input type="datetime-local" name="data_horario" value="<?php echo date('Y-m-d\TH:i', strtotime($sessao['data_horario'])); ?>" required>

            <label for="presenca">Presença:</label>
            <select name="presenca" required>
                <option value="1" <?php echo $sessao['presenca'] ? 'selected' : ''; ?>>Presente</option>
                <option value="0" <?php echo !$sessao['presenca'] ? 'selected' : ''; ?>>Ausente</option>
            </select>

            <label for="observacoes">Observações:</label>
            <textarea name="observacoes" rows="5"><?php echo htmlspecialchars($sessao['observacoes']); ?></textarea>

            <div class="btn-container">
                <a href="prontuario.php?id=<?php echo $sessao['paciente_id']; ?>">Voltar</a>
                <button type="submit">Salvar</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    require_once __DIR__ . '/../../app/Controllers/sessao/sessao_detalhesController.php'
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <title>Detalhes da Sessão</title>
</head>
<body>
    <div class="session-container">
        <h1>Detalhes da Sessão</h1>
        
        <div class="details-section">
            <p><strong>Data e Hora:</strong> <?php echo $sessao['data_horario']; ?></p>
            <p><strong>Presença do Paciente:</strong> <?php echo $sessao['presenca'] ? 'Presente' : 'Ausente'; ?></p>
            <p><strong>Observações:</strong> <?php echo $sessao['observacoes']; ?></p>
        </div>

        <a href="prontuario.php?id=<?php echo $sessao['paciente_id']; ?>" class="btn-back">Voltar</a>
    </div>
</body>
</html>

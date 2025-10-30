<?php
    // O Controller deve buscar os dados da sessão e do paciente para definir $sessao
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
            <p><strong>Data e Hora:</strong> <?php echo $sessao['data']; ?></p>
            
            <p><strong>Presença do Paciente:</strong> <?php echo $sessao['anotacao'] === 'presente' ? 'Presente' : 'Ausente'; ?></p>
            
            <p><strong>Observações:</strong> <?php echo $sessao['sessao_text']; ?></p>
        </div>

        <a href="prontuario.php?id=<?php echo $id_paciente; ?>" class="btn-back">Voltar</a>
    </div>
</body>
</html>